<template>
	<div id='login-page' class='flex h-full justify-center items-center'>
		<LoginForm />
	</div>
</template>

<script>
import LoginForm from "../components/LoginForm/LoginForm";
export default {
	components: {
		LoginForm
	}
};
</script>

<style>
#login-page {
	background-color: #ffffff;
	background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23cad5da' fill-opacity='0.24'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
</style>