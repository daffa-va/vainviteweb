 <main class="page">
     <div class="page-header">
         <div>
             <h1 class="page-title">Sistem & Keamanan</h1>
             <p class="page-subtitle">
                 Ubah kredensial hak akses masuk dan parameter integrasi luar.
             </p>
         </div>
     </div>

     <div class="settings-grid">
         <div class="card">
             <div class="card-header">
                 <h2 class="card-title">
                     <i class="fa-solid fa-lock icon-spacing"></i> Keamanan Akses
                     Masuk
                 </h2>
             </div>
             <form wire:submit.prevent="updateProfile" class="card-body-padding">
                 <div class="form-group">
                     <label for="profName">Nama Lengkap Admin</label>
                     <input type="text" id="profName" class="form-input" wire:model="form.name" required />
                     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <small style="color: var(--red);"><?php echo e($message); ?></small>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                 </div>

                 <div class="form-group">
                     <label for="profEmail">Alamat Email Login</label>
                     <input type="email" id="profEmail" class="form-input" wire:model="form.email" required />
                     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <small style="color: var(--red);"><?php echo e($message); ?></small>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                 </div>

                 <div class="form-group">
                     <label for="profWa">
                         <i class="fa-brands fa-whatsapp" style="color: #25d366"></i> Nomor WhatsApp Tujuan Utama
                     </label>
                     <input type="text" id="profWa" class="form-input" wire:model="form.whatsappNumber"
                         placeholder="Contoh: 628123456789" required />
                     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.whatsappNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <small style="color: var(--red);"><?php echo e($message); ?></small>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                 </div>

                 <div class="form-group">
                     <label for="profLink">Tautan Linktree Perusahaan</label>
                     <input type="url" id="profLink" class="form-input" wire:model="form.linktreeUrl"
                         placeholder="Contoh: https://linktr.ee/vadesign" />
                     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.linktreeUrl'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <small style="color: var(--red);"><?php echo e($message); ?></small>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                 </div>

                 <button type="submit" class="btn-primary" style="align-self: flex-start; margin-top: 8px"
                     wire:loading.attr="disabled" wire:target="updateProfile">
                     <span wire:loading.remove wire:target="updateProfile">
                         <i class="fa-solid fa-floppy-disk icon-spacing"></i> Update Profil & Tautan
                     </span>

                     <span wire:loading wire:target="updateProfile">
                         <i class="fa-solid fa-spinner fa-spin icon-spacing"></i> Menyimpan...
                     </span>
                 </button>
             </form>
         </div>

         <div class="card">
             <div class="card-header">
                 <h2 class="card-title">
                     <i class="fa-solid fa-lock icon-spacing"></i> Pembaruan Kata Sandi
                 </h2>
             </div>
             <form wire:submit.prevent="updatePassword" class="card-body-padding" id="passwordSecureForm">
                 <div class="form-group">
                     <label for="oldPass">Password Lama Saat Ini</label>
                     <div class="password-group" style="position: relative;">
                         <input type="password" id="oldPass" class="form-input" wire:model="form.currentPassword"
                             placeholder="Masukkan sandi lama..." style="padding-right: 45px;" />
                         <button type="button" class="btn-eye-toggle" data-target="oldPass"
                             style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--muted); cursor: pointer;"
                             tabindex="-1">
                             <i class="fa-solid fa-eye"></i>
                         </button>
                     </div>
                     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.currentPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <small style="color: var(--red);"><?php echo e($message); ?></small>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                 </div>

                 <div class="form-group">
                     <label for="newPass">Password Baru Keamanan Tinggi</label>
                     <div class="password-group" style="position: relative;">
                         <input type="password" id="newPass" class="form-input" wire:model="form.password"
                             placeholder="Minimal 8 karakter..." style="padding-right: 45px;" />
                         <button type="button" class="btn-eye-toggle" data-target="newPass"
                             style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--muted); cursor: pointer;"
                             tabindex="-1">
                             <i class="fa-solid fa-eye"></i>
                         </button>
                     </div>
                     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <small style="color: var(--red);"><?php echo e($message); ?></small>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                 </div>

                 <div class="form-group">
                     <label for="confirmPass">Ulangi Password Baru</label>
                     <div class="password-group" style="position: relative;">
                         <input type="password" id="confirmPass" class="form-input"
                             wire:model="form.password_confirmation" placeholder="Ketik ulang sandi baru..."
                             style="padding-right: 45px;" />
                         <button type="button" class="btn-eye-toggle" data-target="confirmPass"
                             style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--muted); cursor: pointer;"
                             tabindex="-1">
                             <i class="fa-solid fa-eye"></i>
                         </button>
                     </div>
                 </div>

                 <button type="submit" class="btn-primary"
                     style="align-self: flex-start; margin-top: 8px; background: var(--yellow); color: black;"
                     wire:loading.attr="disabled" wire:target="updatePassword">

                     <span wire:loading.remove wire:target="updatePassword">
                         <i class="fa-solid fa-key icon-spacing"></i> Simpan Password Baru
                     </span>

                     <span wire:loading wire:target="updatePassword">
                         <i class="fa-solid fa-spinner fa-spin icon-spacing"></i> Memproses...
                     </span>

                 </button>
             </form>
         </div>
     </div>
 </main>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\livewire\admin\setting.blade.php ENDPATH**/ ?>