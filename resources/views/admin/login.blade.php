<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — FairIT Solutions</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-charcoal-950 flex items-center justify-center px-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-brand-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0"/></svg>
            </div>
            <h1 class="text-xl font-bold text-white">FairIT Solutions</h1>
            <p class="text-charcoal-400 text-sm mt-1">Admin Panel</p>
        </div>

        <div class="bg-charcoal-900 rounded-2xl p-8 border border-charcoal-700">
            @if($errors->any())
            <div class="bg-red-900/30 border border-red-700 rounded-xl p-3 mb-5 text-sm text-red-300">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="form-label text-charcoal-300">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-input bg-charcoal-800 border-charcoal-600 text-white placeholder-charcoal-500 focus:border-brand-500" placeholder="admin@fairitsolutions.ch" required autofocus>
                </div>
                <div>
                    <label class="form-label text-charcoal-300">Password</label>
                    <input type="password" name="password" class="form-input bg-charcoal-800 border-charcoal-600 text-white placeholder-charcoal-500 focus:border-brand-500" placeholder="••••••••" required>
                </div>
                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="rounded">
                    <label for="remember" class="text-sm text-charcoal-400">Remember me</label>
                </div>
                <button type="submit" class="btn-primary w-full justify-center py-3 mt-2">Sign In</button>
            </form>
        </div>

        <p class="text-center text-charcoal-600 text-xs mt-6">
            <a href="{{ route('home') }}" class="hover:text-charcoal-400 transition-colors">← Back to website</a>
        </p>
    </div>
</body>
</html>
