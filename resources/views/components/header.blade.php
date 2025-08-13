 <header>
     <div class="logo"><a href="{{ route('games.index') }}" style="text-decoration: none;">PPLG<span>_GIM</span></a></div>
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
                 <x-nav-link href="{{ route('assets.index') }}" :active="request()->is('assets')">Assets</x-nav-link>
             </li>
             <li>
                 <x-nav-link href="{{ route('contact.index') }}" :active="request()->is('contact')">Contact</x-nav-link>
             </li>
         </ul>
     </nav>
 </header>
