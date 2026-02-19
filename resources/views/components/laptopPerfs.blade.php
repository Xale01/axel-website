<div class="ml-10 p-6 bg-bg-main">
    <h2 class="text-brand text-2xl font-black uppercase tracking-widest mb-6 border-b-2 border-brand w-fit pb-1">
        État du Serveur :
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <div class="bg-bg-card p-4 rounded-xl border-l-4 border-accent-cyan shadow-lg">
            <p class="text-text-muted text-xs uppercase font-bold tracking-widest mb-1">Processeur</p>
            <p class="text-2xl font-black text-text-main">{{ $cpu }}%</p>
            <div class="w-full h-1 bg-bg-main mt-2 rounded-full overflow-hidden">
                <div class="h-full bg-accent-cyan" style="width: {{ $cpu }}%"></div>
            </div>
        </div>

        <div class="bg-bg-card p-4 rounded-xl border-l-4 border-accent-pink shadow-lg">
            <p class="text-text-muted text-xs uppercase font-bold tracking-widest mb-1">Mémoire RAM</p>
            <p class="text-2xl font-black text-text-main text-sm">
                {{ $ramUsed }} GB <span class="text-text-muted text-xs">/ {{ $ramTotal }} GB</span>
            </p>
            <div class="w-full h-1 bg-bg-main mt-2 rounded-full overflow-hidden">
                <div class="h-full bg-accent-pink" style="width: {{ ($ramUsed/$ramTotal)*100 }}%"></div>
            </div>
        </div>

        <div class="bg-bg-card p-4 rounded-xl border-l-4 border-brand shadow-lg">
            <p class="text-text-muted text-xs uppercase font-bold tracking-widest mb-1">Stockage SSD</p>
            <p class="text-2xl font-black text-text-main text-sm">
                {{ $diskUsed }} Go <span class="text-text-muted text-xs">/ {{ $diskTotal }} Go</span>
            </p>
            <div class="w-full h-1 bg-bg-main mt-2 rounded-full overflow-hidden">
                <div class="h-full bg-brand" style="width: {{ $diskPercent }}%"></div>
            </div>
        </div>

        <div class="bg-bg-card p-4 rounded-xl border-l-4 border-orange-500 shadow-lg">
            <p class="text-text-muted text-xs uppercase font-bold tracking-widest mb-1">Température</p>
            <p class="text-2xl font-black text-text-main">{{ $temp }}°C</p>
            <p class="text-[10px] {{ $temp > 60 ? 'text-accent-pink' : 'text-accent-cyan' }} font-bold mt-1">
                {{ $temp > 60 ? '🔥 CHAUD' : '❄️ STABLE' }}
            </p>
        </div>

    </div>
</div>