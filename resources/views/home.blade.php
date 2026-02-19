<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    
    <h1 class="text-brand text-4xl md:text-5xl text-center pt-20 pb-20 font-black tracking-wide">
        Bienvenue sur la page web du serveur
    </h1>

    <x-connectedPeople :$users />

    <x-laptopPerfs :$temp :$cpu :$ramUsed :$ramTotal :$diskUsed :$diskTotal :$diskPercent/>
</x-layout>