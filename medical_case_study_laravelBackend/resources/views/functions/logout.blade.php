<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<a href="#" onclick="confirmLogout(event)">Logout</a>

<script>
function confirmLogout(event) {
    event.preventDefault(); // Prevent form submission
    if (confirm("Are you sure you want to log out?")) {
        document.getElementById('logout-form').submit();
    }
}
</script>
