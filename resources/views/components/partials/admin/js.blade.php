<script src="{{ asset('assets/js/global-admin.js') }}"></script>
<script>
    window.addEventListener('toast', event => {
        const toastBox = document.getElementById('toast');
        if (toastBox) {
            toastBox.textContent = event.detail.message;
            toastBox.classList.add('show');
            setTimeout(() => {
                toastBox.classList.remove('show');
            }, 2800);
        }
    });
</script>
<div x-data="{
    show: false,
    message: '',
    type: 'success',
    triggerToast(detail) {
        this.message = detail.message;
        this.show = true;
        setTimeout(() => { this.show = false; }, 3500); // Otomatis hilang dalam 3.5 detik
    }
}" x-on:toast.window="triggerToast($event.detail)" x-show="show"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 translate-y-4 scale-95"
    style="position: fixed; bottom: 24px; right: 24px; z-index: 9999; display: none;"
    :style="{ display: show ? 'flex' : 'none' }">

    <div
        style="background: #1e1e1e; color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1); padding: 14px 20px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); display: flex; align-items: center; gap: 12px; font-family: 'Outfit', sans-serif; font-size: 0.95rem;">
        <span x-text="message"></span>
    </div>
</div>
