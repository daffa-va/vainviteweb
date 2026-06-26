<main class="page">
    <div class="page-header">
        <div>
            <h1 class="page-title">Daftar Harga</h1>
            <p class="page-subtitle">
                Harga mengikuti katalog: Dengan Foto Rp109.000 & Tanpa Foto Rp79.000 per kategori.
            </p>
        </div>
    </div>

    <div class="card">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ikon</th>
                        <th>Kategori</th>
                        <th>Dengan Foto</th>
                        <th>Tanpa Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php $items = $pricelist->get($cat, collect()); ?>
                        <?php $dengan = $items->firstWhere('name', 'Dengan Foto'); ?>
                        <?php $tanpa = $items->firstWhere('name', 'Tanpa Foto'); ?>
                        <tr>
                            <td style="text-align:center;">
                                <i class="fa-solid <?php echo e($dengan?->icon ?? 'fa-tags'); ?>" style="font-size:1.1rem;color:var(--amber);"></i>
                            </td>
                            <td><strong><?php echo e($cat); ?></strong></td>
                            <td>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($dengan): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingId === $dengan->id): ?>
                                        <form wire:submit="savePrice(<?php echo e($dengan->id); ?>)" style="display:flex;gap:4px;align-items:center;">
                                            <input type="number" class="form-input" style="width:130px;padding:4px 8px;font-size:0.85rem;" wire:model="editPrice" />
                                            <button type="submit" class="btn-sm btn-ghost" style="padding:4px 8px;font-size:0.75rem;">Simpan</button>
                                            <button type="button" class="btn-sm btn-danger-ghost" style="padding:4px 8px;font-size:0.75rem;" wire:click="cancelEdit">Batal</button>
                                        </form>
                                    <?php else: ?>
                                        Rp <?php echo e(number_format($dengan->price, 0, ',', '.')); ?>

                                        <button type="button" class="btn-sm btn-ghost" style="padding:2px 8px;font-size:0.7rem;margin-left:4px;" wire:click="startEdit(<?php echo e($dengan->id); ?>)">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php else: ?>
                                    <span style="color:var(--muted);font-style:italic;">-</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($tanpa): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($editingId === $tanpa->id): ?>
                                        <form wire:submit="savePrice(<?php echo e($tanpa->id); ?>)" style="display:flex;gap:4px;align-items:center;">
                                            <input type="number" class="form-input" style="width:130px;padding:4px 8px;font-size:0.85rem;" wire:model="editPrice" />
                                            <button type="submit" class="btn-sm btn-ghost" style="padding:4px 8px;font-size:0.75rem;">Simpan</button>
                                            <button type="button" class="btn-sm btn-danger-ghost" style="padding:4px 8px;font-size:0.75rem;" wire:click="cancelEdit">Batal</button>
                                        </form>
                                    <?php else: ?>
                                        Rp <?php echo e(number_format($tanpa->price, 0, ',', '.')); ?>

                                        <button type="button" class="btn-sm btn-ghost" style="padding:2px 8px;font-size:0.7rem;margin-left:4px;" wire:click="startEdit(<?php echo e($tanpa->id); ?>)">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php else: ?>
                                    <span style="color:var(--muted);font-style:italic;">-</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" style="text-align:center;color:var(--muted);padding:40px;">
                                <strong>Tidak ada data.</strong>
                            </td>
                        </tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\livewire\admin\edit-pricelist.blade.php ENDPATH**/ ?>