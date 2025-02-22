<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>General Medical Clinic</title>
    </head>
    <body>
        <header>
            <nav>
            </nav>
        </header>
        
        <main>
            <aside>
                <!-- Logout Confirmation Modal -->
                <div id="logoutModal" class="modal">
                    <div class="modal-content">
                        <p>Are you sure you want to log out?</p>
                        <button onclick="confirmLogout()">Yes, Logout</button>
                        <button onclick="closeModal()">Cancel</button>
                    </div>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" onclick="openModal()">Logout</a>

            </aside>
            <section>

            </section>
        </main>

        <footer>
        
        </footer>
    </body>
</html>