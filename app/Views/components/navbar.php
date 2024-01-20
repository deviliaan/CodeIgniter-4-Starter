<nav class="flex items-center h-16 p-4 justify-between">
  <img class="w-8 h-8" src="/icons/icon.svg"/>
  <div class="hidden sm:hidden">
    <a href="/">Homepage</a>
    <a href="/dub">Dubbed</a>
  </div>
  <button onclick="handleToggle()" id="menu-btn" class="w-8 h-8 md:hidden">
    <img clas="w-8 h-8" src="/icons/ham.svg"/>
  </button>
</nav>
<div class="hidden flex p-2 flex-col" id="mobile-menu">
  <a class="hover:shadow hover:cursor-pointer p-2 rounded" href="/home">Home</a>
  <a class="hover:shadow p-2 rounded" href="/dubbed">Dubbed</a>
  <a class="hover:shadow p-2 rounded" href="/admin/recent">Admin Area</a>
  <?php if(session()->has('isLoggedin')){ ?>
    <a class="hover:shadow p-2 rounded" href="/admin/logout">Logout</a>
  <?php } ?>
</div>

<script>
  function handleToggle() {
    var x = document.getElementById('mobile-menu')
    x.classList.toggle('hidden')
  }
  
</script>