 <header>
     <div class="logo"><a href="{{ route('games.index') }}" style="text-decoration: none;">PPL<span>GIM</span></a></div>
     <nav>
         <ul>
             <li>
                 <x-nav-link href="{{ route('games.index') }}" :active="request()->is('/')">Home</x-nav-link>
             </li>
             <li>
                 <x-nav-link href="{{ route('games.game') }}" :active="request()->is('games')">Game</x-nav-link>
             </li>
             <li>
                 <x-nav-link href="{{ route('cerpen.index') }}" :active="request()->is('cerpen')">Cerpen</x-nav-link>
             </li>
             <li>
                 <x-nav-link href="#" :active="request()->is('contact')">Contact</x-nav-link>
             </li>
         </ul>
     </nav>
 </header>
