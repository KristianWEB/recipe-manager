<template>
	<div class='w-full max-w-xs font-roboto bg-bg-gray'>
		<form class='rounded px-8 pt-6 pb-8 mb-4'>
			<h3 class='text-xl font-medium pb-6 mb-0'>Filters</h3>
			<div class='mb-4'>
				<label class='block text-dark-gray text-sm font-bold mb-2' for='username'>Search by Keyword</label>
				<input
					class='shadow appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline'
					id='username'
					type='text'
				/>
			</div>
			<div class='mb-4'>
				<label class='block text-dark-gray text-sm font-bold mb-2' for='username'>Search by Calories</label>
				<input
					class='shadow appearance-none border rounded w-full py-2 px-3 text-dark-gray leading-tight focus:outline-none focus:shadow-outline'
					id='username'
					type='text'
				/>
			</div>
			<div class='mb-4'>
				<label class='block text-dark-gray text-sm font-bold mb-2' for='grid-state'>Pick a Diet label</label>
				<div class='relative'>
					<select
						class='shadow border text-dark-gray block appearance-none w-full py-3 px-4 pr-8 rounded leading-tight focus:outline-none'
						id='grid-state'
					>
						<option>Balanced</option>
						<option>High-Protein</option>
						<option>High-Fiber</option>
						<option>Low-Carb</option>
						<option>Low-Fat</option>
						<option>Low-Sodium</option>
					</select>
					<div
						class='pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700'
					>
						<svg class='fill-current h-4 w-4' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'>
							<path d='M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z' />
						</svg>
					</div>
				</div>
			</div>
			<div class='mb-4'>
				<label
					class='block text-dark-gray text-sm font-bold mb-2'
					for='username'
				>Cooking time ( Minutes )</label>
				<input
					class='shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'
					id='username'
					type='text'
				/>
			</div>
			<div class='flex items-center justify-end'>
				<button
					class='py-1 px-4 rounded-lg focus:outline-none focus:shadow-outline border text-outline border-outline font-medium'
					type='button'
				>Search</button>
			</div>
		</form>
	</div>
</template>
