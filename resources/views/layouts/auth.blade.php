<script>
  // If no token → force signup
  if (!localStorage.getItem('auth_token')) {
    window.location.href = '/signup';
  }
  // If logged in as shopkeeper
  else if (localStorage.getItem('auth_token') && localStorage.getItem('user_role') === 'shopkeeper') {
    if (window.location.pathname === '/signup') {
      window.location.href = '/shopkeeper/dashboard';
    }
  }
  // If logged in as admin
  else if (localStorage.getItem('auth_token') && localStorage.getItem('user_role') === 'admin') {
    if (window.location.pathname === '/signup') {
      window.location.href = '/admin/dashboard';
    }
  }
</script>
