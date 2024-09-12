<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

       

        <!-- Name -->
        <div>
            <x-input-label for="nombre" :value="__('Nombre')" class="required"/>
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" maxlength="20" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="mt-4">
            <x-input-label for="apellidos" :value="__('Apellidos')" class="required"/>
            <x-text-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autocomplete="apellidos" maxlength="40" />
            <x-input-error :messages="$errors->get('apellidos')" class="mt-2" />
        </div>

        <!-- DNI -->
        <div class="mt-4">
            <x-input-label for="dni" :value="__('DNI')" class="required"/>
            <x-text-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autocomplete="dni" maxlength="9"/>
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="required"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="required"/>

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            :value="old('password')"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="required"/>

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation" 
                            :value="old('password_confirmation')"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="mt-4">
            <x-input-label for="telefono" :value="__('Telefono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" autocomplete="telefono" maxlength="12"/>
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Pais -->
        <div class="mt-4">
        <x-input-label for="pais" :value="__('Pais')" />
        <select name="pais[]" id="pais" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option value="" selected="selected" >---Seleccione su país---</option>
            @foreach ($countries as $country)
                <option value="{{ $country['name'] }}" {{ in_array($country['name'], old('pais', [])) ? 'selected' : '' }}>{{ $country['name'] }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('pais')" class="mt-2" />
        </div>

        <!-- Sobre ti -->
        <div class="mt-4">
            <x-input-label for="sobreti" :value="__('Sobre ti')" />
            <x-text-input id="sobreti" class="block mt-1 w-full" type="text" name="sobreti" :value="old('sobreti')" autocomplete="sobreti" maxlength="250"/>
            <x-input-error :messages="$errors->get('sobreti')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
