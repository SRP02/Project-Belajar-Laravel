<aside
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
  aria-label="Sidenav"
  id="drawer-navigation"
>
  <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
    <form action="#" method="GET" class="md:hidden mb-2">
      <label for="sidebar-search" class="sr-only">Search</label>
      <div class="relative">
        <div
          class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
        >
          <img
            class="w-5 h-5 text-gray-500 dark:text-gray-400"
            src="https://www.svgrepo.com/show/133949/student.svg"
            alt="Search Icon"
          />
        </div>
        <input
          type="text"
          name="search"
          id="sidebar-search"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
          placeholder="Search"
        />
      </div>
    </form>
    <ul>
      <li>
        <x-admin-sidelink
          href="/dashboard/students" 
          icon="https://www.svgrepo.com/show/133949/student.svg"
          alt="Student Icon" 
          :active="request()->is('dashboard/students')"
          >
            Student
        </x-admin-sidelink>
      </li>
      <li>
        <x-admin-sidelink
          href="/dashboard/grade" 
          icon="https://cdn-icons-png.flaticon.com/512/4345/4345367.png"
          alt="Grade Icon" 
          :active="request()->is('dashboard/grade')"
          >
            Grade
        </x-admin-sidelink>
      </li>
      <li>
        <x-admin-sidelink
          href="/dashboard/deparment" 
          icon="https://cdn-icons-png.flaticon.com/512/3166/3166006.png"
          alt="Department Icon" 
          :active="request()->is('dashboard/deparment')"
          >
            Department
        </x-admin-sidelink>
      </li>
    </ul>
    
  </div>
</aside>
