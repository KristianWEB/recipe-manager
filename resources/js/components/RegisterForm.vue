<template>
	<div>
		<modal name='register' width='100%' height='auto'>
			<div class='container mx-auto'>
				<div class='flex flex-wrap justify-center'>
					<div class='w-full max-w-sm'>
						<div class='flex flex-col break-words bg-white border border-2 rounded shadow-md'>
							<div class='font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0'>Register</div>

							<form class='w-full p-6' @submit.prevent='registerUser'>
								<div class='flex flex-wrap mb-6'>
									<label for='name' class='block text-gray-700 text-sm font-bold mb-2'>Name:</label>

									<input
										id='name'
										type='text'
										class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
										name='name'
										required
										autofocus
										v-model='name'
									/>
								</div>

								<div class='flex flex-wrap mb-6'>
									<label for='email' class='block text-gray-700 text-sm font-bold mb-2'>E-Mail Address:</label>

									<input
										id='email'
										type='email'
										class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
										name='email'
										required
										v-model='email'
									/>
									<span v-if='has("email")' v-text='errors.email[0]' class='text-red-500'></span>
								</div>

								<div class='flex flex-wrap mb-6'>
									<label for='password' class='block text-gray-700 text-sm font-bold mb-2'>Password:</label>

									<input
										id='password'
										type='password'
										class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
										name='password'
										required
										v-model='password'
									/>
									<span v-if='has("password")' v-text='errors.password[0]' class='text-red-500'></span>
								</div>

								<div class='flex flex-wrap mb-6'>
									<label
										for='password-confirm'
										class='block text-gray-700 text-sm font-bold mb-2'
									>Confirm Password:</label>

									<input
										id='password-confirm'
										type='password'
										class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
										name='password_confirmation'
										required
										v-model='password_confirmation'
									/>
								</div>

								<div class='flex flex-wrap'>
									<button
										type='submit'
										class='inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700'
									>Register</button>

									<p class='w-full text-xs text-center text-gray-700 mt-8 -mb-4'>
										Already have an account?
										<button
											type='button'
											class='text-blue-500 hover:text-blue-700 no-underline'
											@click='$modal.show("login")'
										>Login</button>
									</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</modal>
	</div>
</template>

<script>
export default {
	data() {
		return {
			name: "",
			email: "",
			password: "",
			password_confirmation: "",
			errors: []
		};
	},
	methods: {
		registerUser() {
			axios
				.post("/register", this.$data)
				.then(() => {
					window.location.pathname = "/account";
				})
				.catch(error => {
					this.errors = error.response.data.errors;
				});
		},
		has(field) {
			return this.errors.hasOwnProperty(field);
		}
	}
};
</script>