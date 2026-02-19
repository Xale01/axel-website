<div class="ml-10 p-6">
    <h2 class="text-brand text-2xl font-black uppercase tracking-widest mb-6 border-b-2 border-brand w-fit pb-1">
        Liste des utilisateurs dernièrement connectés :
    </h2>
    
    <ul class="space-y-3 max-w-md">
        @forelse ($users as $user)
            <li class="bg-bg-card p-4 rounded-lg border-l-4 border-accent-cyan text-text-main hover:translate-x-2 transition-transform shadow-lg">
                <span class="font-bold text-accent-cyan">{{ $user->username }}</span> 
                <span class="text-text-muted text-sm ml-2 italic">
                    ({{ $user->last_login_at ? $user->last_login_at->diffForHumans() : "Jamais connecté" }})
                </span>
            </li>
        @empty
            <li class="text-accent-pink font-medium italic bg-bg-card p-4 rounded-lg border-l-4 border-accent-pink">
                Aucun utilisateur
            </li>
        @endforelse
    </ul>
</div>