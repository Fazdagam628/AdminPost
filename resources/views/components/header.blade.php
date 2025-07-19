 <header>
     <div class="logo">PPL<span>GIM</span></div>
     <nav>
         <ul>
             <li>
                 <x-nav-link href="{{ route('games.index') }}" :active="request()->is('/')">Home</x-nav-link>
             </li>
             <li>
                 <x-nav-link href="{{ route('games.game') }}" :active="request()->is('game')">Game</x-nav-link>
             </li>
             <li>
                 <x-nav-link href="#" :active="request()->is('cerpen')">Cerpen</x-nav-link>
             </li>
             <li>
                 <x-nav-link href="#" :active="request()->is('contact')">Contact</x-nav-link>
             </li>
         </ul>
     </nav>
 </header>
