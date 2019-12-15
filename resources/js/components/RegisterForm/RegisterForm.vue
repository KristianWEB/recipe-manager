<template>
	<div id='registerFormContainer' class='shadow-md w-96 rounded-lg'>
		<div class='bg-light-gray'>
			<h1 class='p-6 text-3xl font-medium'>Create an account</h1>
		</div>
		<form class='w-full bg-white'>
			<div class='md:flex md:items-center mb-6'>
				<div class='w-full mt-6 px-5'>
					<label for='username' class='text-dark-gray font-medium'>Username</label>
					<input
						class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
						id='inline-full-name'
						type='text'
						placeholder='Your username'
					/>
				</div>
			</div>
			<div class='w-full mt-6 px-5'>
				<label for='email' class='text-dark-gray font-medium'>Email address</label>
				<input
					class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
					id='email'
					type='text'
					placeholder='example@gmail.com'
				/>
			</div>
			<div class='w-full mt-6 px-5'>
				<label for='password' class='text-dark-gray font-medium'>Password</label>
				<input
					class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
					id='password'
					type='text'
					placeholder='Password ( at least 6 characters )'
				/>
			</div>
			<div class='flex items-center justify-center pt-6 pt-6 pb-4'>
				<div class='md:w-2/3'>
					<button
						class='shadow text-white py-2 px-16 rounded bg-orange font-medium text-lg'
						type='button'
					>Create your account</button>
				</div>
			</div>
			<div class='flex items-center justify-center'>
				<h3 class='pb-3 text-dark-gray'>
					Already have an account?
					<a href='#' class='text-orange font-medium'>Sign in</a>
				</h3>
			</div>
		</form>
	</div>
</template>

<script></script>

<style>
#registerFormContainer {
	font-family: Roboto;
}
</style>