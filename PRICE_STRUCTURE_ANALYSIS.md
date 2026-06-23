# Price Structure Dependency Analysis — Va Invite

## Executive Summary

**YES — The public website DOES depend on the old price structure.** The public-facing order form uses price names like "Dengan Foto" and "Tanpa Foto" per category, and directly references `price_id` from the `prices` table. The public website will BREAK if this structure changes without coordinating updates across multiple integration points.

---

## Current Price Structure

### Database Schema (prices table)
```
id (int, PK)
category (string) — e.g., "Wedding", "Birthday", "Umum / Seminar", etc.
name (string) — e.g., "Dengan Foto" or "Tanpa Foto"
price (integer) — numeric price value
icon (string) — FontAwesome icon class
created_at, updated_at (timestamps)
```

### Current Data (18 price records)
All 9 categories follow the same pattern:
- **Category**: Wedding, Birthday, Umum / Seminar, Christmas & NY, Aqiqah & Tasmiyah, Syukuran & Islami, Tasyakuran Khitan, Party & Dinner, School & Graduation
- **Per Category**: 2 price tiers only — "Dengan Foto" (Rp 109,000) and "Tanpa Foto" (Rp 79,000)
- **Icon**: Unique icon per category (fa-heart, fa-birthday-cake, fa-calendar-days, etc.)

---

## PUBLIC-FACING DEPENDENCIES

### 1. **PublicController** (`app/Http/Controllers/PublicController.php`)

#### `storeOrder()` Method (Lines 76-118)
```php
public function storeOrder(Request $request)
{
    $request->validate([
        'price_id'    => 'required|exists:prices,id',  // ← DIRECT DEPENDENCY
        'client_name' => 'required|string|max:255',
        'client_wa'   => 'required|string|max:20',
    ]);

    $package = Price::findOrFail($request->price_id);

    Order::create([
        'price_id'    => $package->id,
        'client_name' => $request->client_name,
        'client_wa'   => $request->client_wa,
        'total_price' => $package->price,  // ← READS FROM prices.price
        'status'      => 'pending',
        'custom_note' => 'Pemesanan mandiri dari formulir website.',
    ]);

    // WhatsApp message includes:
    // "▪️ *Paket Layanan:* " . $package->name
    // "▪️ *Kategori Rumpun:* " . $package->category
    // "▪️ *Acuan Harga Web:* Rp " . number_format($package->price, 0, ',', '.')
}
```

**What breaks if prices structure changes:**
- ✗ Validation will fail if `price_id` doesn't exist in prices table
- ✗ Package lookup will fail if Price model structure changes
- ✗ WhatsApp message will be incomplete or malformed if `name` or `category` fields are removed
- ✗ `total_price` calculation depends on `$package->price` field existing

#### Route Definition (`routes/web.php`, Line 9)
```php
Route::post('/submit-order', [PublicController::class, 'storeOrder'])->name('public.order.submit');
```

---

### 2. **Public Order Form** (`resources/views/index.blade.php`)

#### Form HTML (Lines 410-447)
```html
<form id="publicOrderForm" action="{{ route('public.order.submit') }}" method="POST" target="_blank">
    @csrf
    <div class="public-modal-body">
        <input type="hidden" name="price_id" id="modalPriceId" value="" />
        
        <div class="public-form-group">
            <label>Kategori yang Dipilih</label>
            <input type="text" id="modalServiceName" class="public-form-input disabled-look" readonly value="" />
        </div>
        
        <div class="public-form-group">
            <label for="client_name">Nama Lengkap Anda *</label>
            <input type="text" name="client_name" id="client_name" class="public-form-input" required />
        </div>
        
        <div class="public-form-group">
            <label for="client_wa">Nomor WhatsApp Aktif *</label>
            <input type="tel" name="client_wa" id="client_wa" class="public-form-input" required />
        </div>
    </div>
</form>
```

**Dependency:**
- ✗ Form submits `price_id` to backend — must be valid ID from prices table
- ✗ `modalServiceName` displays price name (populated by JavaScript)

---

### 3. **JavaScript Form Handler** (`public/assets/js/script.js`, Lines 235-285)

```javascript
// Order-trigger button listeners
document.querySelectorAll(".order-trigger").forEach((button) => {
    button.addEventListener("click", () => {
        const priceId = button.dataset.priceId;      // ← FROM data-price-id ATTRIBUTE
        const serviceName = button.dataset.serviceName; // ← FROM data-service-name ATTRIBUTE

        modalPriceId.value = priceId;
        modalServiceName.value = serviceName;

        publicOrderModal.classList.add("show");
        document.body.style.overflow = "hidden";
    });
});
```

**Dependency:**
- ✗ JavaScript expects `data-price-id` and `data-service-name` attributes on trigger buttons
- ✗ Currently NO order-trigger buttons exist in the public index.blade.php file (search found 0 matches)

**CRITICAL ISSUE:** The JavaScript code for `.order-trigger` buttons exists but the buttons are NOT present in index.blade.php. The pricing section only shows hardcoded HTML with static price values, not dynamic price cards with order buttons.

---

### 4. **Pricing Section** (`resources/views/index.blade.php`, Lines 220-258)

```blade
<div class="pricing-grid">
    <div class="price-card reveal featured-card" data-delay="0">
        <div class="price-card-header">
            <span class="price-icon"><i class="fa-solid fa-envelope" style="color: #f59e0b"></i></span>
            <div>
                <h3>Pilih Tema Anda</h3>
                <span class="price-free-barcode"><i class="fa-solid fa-qrcode"></i> Free Barcode</span>
            </div>
        </div>
        <ul class="price-list">
            <li>
                <span class="price-item">
                    <span class="price-item-name">Tanpa Foto</span>
                    <span class="price-item-badge">Hemat Rp30rb</span>
                </span>
                <span class="price-val">
                    <span class="price-old">Rp109.000</span>
                    <span class="price-new">Rp79.000</span>
                </span>
            </li>
            <li>
                <span class="price-item">
                    <span class="price-item-name">Dengan Foto</span>
                    <span class="price-item-badge best">Terlaris</span>
                </span>
                <span class="price-val">
                    <span class="price-old">Rp139.000</span>
                    <span class="price-new">Rp109.000</span>
                </span>
            </li>
        </ul>
        <a href="https://wa.me/..." target="_blank" class="btn-card">
            <i class="fa-solid fa-circle-dollar-to-slot icon-spacing"></i> Order Sekarang
        </a>
    </div>
</div>
```

**Dependency:**
- ✗ Currently HARDCODED prices (Rp79.000, Rp109.000, Rp139.000)
- ✗ Service names hardcoded as "Tanpa Foto" and "Dengan Foto"
- ✗ Order button redirects to WhatsApp — NOT using the order form modal
- ✗ **NOT pulling from prices table dynamically**

---

## ADMIN-FACING DEPENDENCIES

### 1. **EditPricelist Component** (`app/Livewire/Admin/EditPricelist.php`)

```php
public function mount()
{
    // Line 66: Groups prices by category
    $pricelist = Price::orderBy('category')->orderBy('name')->get()->groupBy('category');
}

public function updatePrice($itemId)
{
    $item = Price::find($itemId);
    $item->update(['price' => $this->editPrice]);
    // ...
}
```

**Direct dependency on:**
- ✗ `prices` table existence
- ✗ `category` and `name` fields
- ✗ `price` field for editing

### 2. **OrderMasuk Component** (`app/Livewire/Admin/OrderMasuk.php`, Lines 39-81)

```php
public function mount($id)
{
    $order = Order::with('price')->findOrFail($id);
    
    if ($order->price) {
        // Line 43: Loads available services by category
        $this->availableServices = Price::where('category', $order->price->category)->get();
    }
}

public function updatePrice()
{
    $chosenService = Price::find($this->form->priceId);
    $finalPrice = $chosenService ? $chosenService->price : 0;
    
    Order::findOrFail($this->orderId)->update([
        'price_id'    => $this->form->priceId,
        'total_price' => $finalPrice,
    ]);
}
```

**Direct dependencies:**
- ✗ `price` relationship on Order model
- ✗ `price_id`, `category`, `price` fields on Price model

### 3. **KelolaOrder Component** (`app/Livewire/Admin/KelolaOrder.php`)

```php
// Line 92: Creates orders without price_id
Order::create([
    'price_id'      => null,
    'total_price'   => $dataArray['totalPrice'],
    // ...
]);
```

**Dependency:**
- ✗ `price_id` column must exist on orders table

### 4. **Dashboard Component** (`app/Livewire/Admin/Dashboard.php`, Line 32)

```php
$latestOrders = Order::with('price')
    ->where('status', 'done')
    ->latest('id')
    ->take(5)
    ->get();
```

Displays price name in dashboard table:
```blade
@elseif ($order->price)
    {{ $order->price->name }} <small style="color: var(--amber)">({{ $order->price->category }})</small>
```

---

## SUMMARY OF PRICE REFERENCES

### Files Using prices Table:
1. ✓ `app/Http/Controllers/PublicController.php` — storeOrder()
2. ✓ `app/Livewire/Admin/EditPricelist.php` — Display & edit prices by category
3. ✓ `app/Livewire/Admin/OrderMasuk.php` — Service selection & price lookup
4. ✓ `app/Livewire/Admin/KelolaOrder.php` — price_id handling
5. ✓ `app/Livewire/Admin/Dashboard.php` — Display price info
6. ✓ `resources/views/index.blade.php` — Hardcoded pricing display (NOT dynamic)
7. ✓ `public/assets/js/script.js` — Modal form handler (unused)

### Database Columns Referenced:
- `prices.id` — Foreign key constraint
- `prices.category` — Service categorization
- `prices.name` — "Dengan Foto" / "Tanpa Foto"
- `prices.price` — Numeric price value
- `prices.icon` — Category icon display

### Orders Table Columns:
- `orders.price_id` — Foreign key to prices(id), nullable
- `orders.total_price` — Denormalized price snapshot
- `orders.category` — NOT stored; derived from price relationship

---

## IMPACT ASSESSMENT: IF PRICES STRUCTURE CHANGES

### 🔴 BREAKING CHANGES if you:

1. **Remove `prices` table** → 
   - ✗ PublicController::storeOrder() crashes
   - ✗ All admin components crash
   - ✗ Existing orders with price relationships fail to load

2. **Remove `name` or `category` fields** →
   - ✗ WhatsApp messages in storeOrder() incomplete
   - ✗ EditPricelist display broken
   - ✗ OrderMasuk service selection broken
   - ✗ Dashboard price display shows NULL

3. **Remove `price` field** →
   - ✗ storeOrder() cannot calculate total_price
   - ✗ OrderMasuk cannot show price to admin

4. **Change foreign key constraint on orders.price_id** →
   - ✗ Existing orders become orphaned
   - ✗ Queries using `Order::with('price')` fail

5. **Rename `category` field** →
   - ✗ OrderMasuk filtering by category fails
   - ✗ EditPricelist grouping by category fails

---

## RECOMMENDATION: Safe Refactoring Strategy

If you want to change the price structure:

1. **Create a new pricing system** in parallel (new tables/models)
2. **Add migration** to copy existing prices to new structure
3. **Update all references** in this order:
   - PublicController::storeOrder()
   - All admin Livewire components
   - Order model relationships
   - View templates
4. **Run tests** on order flow (public + admin)
5. **Only then** deprecate old prices table

---

## KEY FINDINGS

| Item | Status | Impact |
|------|--------|--------|
| Public order form uses price_id | ✓ Yes | HIGH — Form breaks without it |
| Public prices are dynamic from DB | ✗ No | LOW — Currently hardcoded |
| Admin depends on price names | ✓ Yes | HIGH — Multiple components |
| Order records store price_id | ✓ Yes | HIGH — Foreign key constraint |
| Price structure is used in 6+ files | ✓ Yes | HIGH — Tightly coupled |

