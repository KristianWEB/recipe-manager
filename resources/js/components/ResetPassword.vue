<template>
	<div>
		<modal name='resetPassword' width='100%' height='auto'>
			<div class='container mx-auto'>
				<div class='flex flex-wrap justify-center'>
					<div class='w-full max-w-sm'>
						<div class='flex flex-col break-words bg-white border border-2 rounded shadow-md'>
							<div class='font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0'>Reset Password</div>
							<form class='w-full p-6'>
								<input type='hidden' name='token' />
								<div class='flex flex-wrap mb-6'>
									<label for='email' class='block text-gray-700 text-sm font-bold mb-2'>E-Mail Address</label>
									<input
										id='email'
										type='email'
										class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
										name='email'
										required
										autofocus
									/>
								</div>

								<div class='flex flex-wrap mb-6'>
									<label for='password' class='block text-gray-700 text-sm font-bold mb-2'>Password:</label>
									<input
										id='password'
										type='password'
										class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
										name='password'
										required
									/>
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
									/>
								</div>

								<div class='flex flex-wrap'>
									<button
										type='submit'
										class='bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline'
									>Reset Password</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</modal>
	</div>
</template>