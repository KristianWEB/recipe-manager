<template>
	<div id='registerFormContainer' class='shadow-md w-96 rounded-lg'>
		<div class='bg-light-gray rounded-t-lg'>
			<h1 class='p-6 text-3xl font-bold text-heading-primary'>Create an account</h1>
		</div>
		<form class='w-full bg-white' @submit.prevent='authenticate'>
			<div class='md:flex md:items-center mb-6'>
				<div class='w-full mt-6 px-5'>
					<label for='username' class='text-dark-gray font-bold'>Username</label>
					<input
						class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
						id='inline-full-name'
						type='text'
						placeholder='Your username'
						name='username'
						v-model='form.username'
					/>
				</div>
			</div>
			<div class='w-full mt-6 px-5'>
				<label for='email' class='text-dark-gray font-bold'>Email address</label>
				<input
					class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
					id='email'
					type='text'
					placeholder='example@gmail.com'
					v-model='form.email'
				/>
			</div>
			<div class='w-full mt-6 px-5'>
				<label for='password' class='text-dark-gray font-bold'>Password</label>
				<input
					class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
					id='password'
					type='text'
					placeholder='Password ( at least 6 characters )'
					v-model='form.password'
				/>
			</div>
			<div class='w-full mt-6 px-5'>
				<label for='password_confirmation' class='text-dark-gray font-bold'>Confirm Password</label>
				<input
					class='appearance-none rounded w-full py-2 px-4 leading-tight focus:outline-none bg-light-gray placeholder-input-gray'
					id='password_confirmation'
					type='password'
					placeholder='Password ( at least 6 characters )'
					name='password_confirmation'
					v-model='form.password_confirmation'
				/>
			</div>
			<div class='flex items-center justify-center pt-6 pt-6 pb-4'>
				<div class='md:w-2/3'>
					<button
						class='shadow text-white py-2 px-16 rounded bg-orange font-medium text-lg'
						type='submit'
					>Create your account</button>
				</div>
			</div>
			<div class='flex items-center justify-center'>
				<h3 class='pb-3 text-dark-gray'>
					Already have an account?
					<router-link to='/login' class='text-orange font-bold'>Sign in</router-link>
				</h3>
			</div>
		</form>
	</div>
</template>

<script>
import { register } from "../../helpers/auth";
export default {
	data() {
		return {
			form: {
				username: "",
				email: "",
				password: "",
				password_confirmation: ""
			},
			error: null
		};
	},
	methods: {
		authenticate() {
			this.$store.dispatch("register");
			register(this.$data.form)
				.then(res => {
					this.$store.commit("loginSuccess", res);
					this.$router.push({ path: "/" });
				})
				.catch(err => {
					this.$store.commit("loginFailed", { err });
				});
		}
	}
};
</script>

<style>
#registerFormContainer {
	font-family: Roboto;
}
</style>