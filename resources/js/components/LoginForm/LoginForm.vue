<template>
	<div id='loginFormContainer' class='shadow-md w-96'>
		<div class='bg-light-gray rounded-t-lg'>
			<h1 class='p-6 text-3xl font-bold text-heading-primary'>Sign in with your account</h1>
		</div>
		<form class='w-full bg-white'>
			<div class='w-full pt-8 px-5'>
				<label for='email' class='text-dark-gray font-bold'>Email address</label>
				<input
					class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
					id='email'
					type='text'
					placeholder='example@gmail.com'
				/>
			</div>
			<div class='w-full pt-6 px-5'>
				<label for='password' class='text-dark-gray font-bold'>Password</label>
				<input
					class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
					id='password'
					type='text'
					placeholder='Password ( at least 6 characters )'
				/>
			</div>
			<div class='flex items-center justify-center pt-8 pb-4'>
				<div>
					<button
						class='shadow text-white py-2 px-16 rounded bg-orange font-medium text-lg'
						type='button'
					>Sign in</button>
				</div>
			</div>
			<div class='flex items-center justify-center rounded-b-lg'>
				<h3 class='pb-3 text-dark-gray'>
					Don't have an account?
					<router-link to='/register' class='text-orange font-bold'>Sign up</router-link>
				</h3>
			</div>
		</form>
	</div>
</template>

<script></script>

<style>
#loginFormContainer {
	font-family: Roboto;
}
</style>