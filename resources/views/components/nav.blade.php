@if(Auth::check())
<!-- Left Sidebar (Collapsible) -->
<div id="sidebar" style="position: fixed; left: -260px; top: 0; width: 260px; height: 100vh; background-color: #f8f9fa; border-right: 1px solid #e0e0e0; padding: 20px; display: flex; flex-direction: column; transition: left 0.3s ease; z-index: 1000;">
    
    <!-- Admin Profile (Portrait) -->
    <div style="text-align: center; padding-bottom: 30px; border-bottom: 1px solid #e0e0e0; margin-bottom: 30px;">
        <div style="width: 80px; height: 80px; background-color: #9CAF88; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 36px; margin: 0 auto 15px;">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <p style="margin: 0; color: #2C3E50; font-weight: 600; font-size: 16px;">{{ Auth::user()->name }}</p>
    </div>

    <!-- Main Navigation -->
    <div style="flex-grow: 1;">
        <p style="color: #9CAF88; font-weight: 600; font-size: 11px; text-transform: uppercase; margin: 0 0 15px 0; letter-spacing: 1px;">Main Navigation</p>
        
        <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 8px;">
                <a href="/flowers" style="display: flex; align-items: center; gap: 12px; padding: 12px 15px; color: #2C3E50; text-decoration: none; border-radius: 5px; background-color: #E8F0E5; border-left: 4px solid #9CAF88; transition: all 0.3s ease;">
                    <span style="font-size: 20px;">🌸</span>
                    <span style="font-weight: 500; font-size: 14px;">Flower Seeds</span>
                </a>
            </li>
            <li style="margin-bottom: 8px;">
                <a href="/" style="display: flex; align-items: center; gap: 12px; padding: 12px 15px; color: #2C3E50; text-decoration: none; border-radius: 5px; transition: all 0.3s ease;">
                    <span style="font-size: 20px;">🏠</span>
                    <span style="font-weight: 500; font-size: 14px;">Home</span>
                </a>
            </li>
            <li style="margin-bottom: 8px;">
                <a href="#" style="display: flex; align-items: center; gap: 12px; padding: 12px 15px; color: #2C3E50; text-decoration: none; border-radius: 5px; transition: all 0.3s ease;">
                    <span style="font-size: 20px;">📦</span>
                    <span style="font-weight: 500; font-size: 14px;">Orders</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout Button -->
    <div style="padding-top: 20px; border-top: 1px solid #e0e0e0;">
        <form action="/logout" method="POST" style="margin: 0; width: 100%;">
            @csrf
            <button type="submit" style="width: 100%; background-color: #E07856; border: none; color: white; font-weight: 600; padding: 12px 15px; border-radius: 5px; cursor: pointer; transition: all 0.3s ease; font-size: 14px;">Logout</button>
        </form>
    </div>

</div>

<!-- Overlay (shown when sidebar is open) -->
<div id="sidebarOverlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); display: none; z-index: 999;" onclick="toggleSidebar()"></div>

<!-- Top Navbar -->
<nav style="background-color: white; padding: 15px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <!-- Left - Hamburger Menu -->
        <button id="hamburger" onclick="toggleSidebar()" style="background: none; border: none; cursor: pointer; padding: 0; display: flex; align-items: center; justify-content: center;">
            <svg style="width: 28px; height: 28px; color: #9CAF88;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>

        <!-- Right - User actions -->
        <div style="display: flex; gap: 20px; align-items: center;">
            <!-- Language Selector -->
            <div style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <svg style="width: 20px; height: 20px; color: #9CAF88;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM14.917 9h1.946a6.004 6.004 0 01-2.783-4.118c.454 1.148.748 2.572.837 4.118zM12.403 5.882A8.001 8.001 0 0112.403 9H9.75V5.75a6.002 6.002 0 012.653.132zM9.75 9v3.118A6.002 6.002 0 017.597 14.118A8.001 8.001 0 019.75 9zM9.75 5.75V9H6.597a6.002 6.002 0 012.153-3.118zM14.915 5.882A6.003 6.003 0 0010.25 5.75v3.132a8 8 0 002.665-.132zM4.253 12.5H2.307a6.005 6.005 0 002.783 4.118c-.454-1.148-.748-2.572-.837-4.118zM10.25 14.25v3.132a6.002 6.002 0 01-2.653-.132A8.001 8.001 0 0110.25 14.25zM14.917 12.5a8.003 8.003 0 01-1.663 2.986c.454-1.148.748-2.572.837-4.118h1.946zM12.403 14.118A8.001 8.001 0 0112.403 11h2.653a6.002 6.002 0 01-2.653 3.118z" clip-rule="evenodd"></path>
                </svg>
                <span style="color: #9CAF88; font-weight: 500;">en</span>
            </div>

            <!-- Admin Greeting -->
            <span style="color: #2C3E50; font-weight: 500;">Hi! {{ Auth::user()->name }}</span>
        </div>
    </div>
</nav>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    
    if (sidebar.style.left === '-260px' || sidebar.style.left === '') {
        sidebar.style.left = '0';
        overlay.style.display = 'block';
    } else {
        sidebar.style.left = '-260px';
        overlay.style.display = 'none';
    }
}

// Close sidebar when clicking on a link
document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', () => {
        document.getElementById('sidebar').style.left = '-260px';
        document.getElementById('sidebarOverlay').style.display = 'none';
    });
});
</script>
@endif