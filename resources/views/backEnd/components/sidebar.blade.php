<div class="pe-3 mt-2" id="sidebar-wrapper">
    <div class="list-group list-group-flush mt-2">
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('dashboard') ? 'activeSidebar' : '') }}" href={{
            url('dashboard') }}><i class="fa-regular fa-folder-closed me-2"></i>Dashboard <span
                class="badge bg-danger text-notif">1</span> </a>
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('manage-user*') ? 'activeSidebar' : '' ) }} " href={{
            url('manage-user') }}><i class="fa-regular fa-user me-2"></i>Manage User</a>
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('kategori*') ? 'activeSidebar' : '' ) }} " href={{
            url('kategori') }}><i class="fa-solid fa-users-rectangle me-2"></i>Kategori / Kelas</a>
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('master*') ? 'activeSidebar' : '' ) }} " href={{
            url('master') }}><i class="fa-solid fa-inbox me-2"></i>Master Exam</a>
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('user-exam*') ? 'activeSidebar' : '' ) }} " href={{
            url('user-exam') }}><i class="fa-regular fa-lemon me-2"></i>User Exam</a>
        <a class=" sidebar-text p-3  py-2 mb-2 {{ (request()->is('result-exam*') ? 'activeSidebar' : '' ) }} " href={{
            url('result-exam') }}><i class="fa-solid fa-check me-2"></i>Result Exam</a>
    </div>
</div>