<template>
	<button 
		type="submit" 
		@click="clicked"
		:disabled="disabled"
		class="inline-flex items-center rounded-md transition ease-in-out duration-200"
		:class="[disabled == true ? types[type]['disabled'] : types[type]['active'] , sizes[size], {'w-full justify-center' : full}]">
		<slot></slot>
    </button>
</template>

<script>  
	export default {
		props: {
			type: {
				type: String,
				default: 'primary'
			},
			size: {
				type: String,
				default: 'md'
			},
			full: {
				type: Boolean,
				default: false,
			},
			disabled: {
				type: Boolean,
				default: false,
			}
		},

		data() {
			return {
				types: {
					primary: {
						active: `border border-transparent text-white bg-black 
						hover:bg-white hover:text-black hover:border-black 
						focus:outline-none focus:border-accents-7 focus:shadow-outline-gray `,
						disabled: `border border-transparent text-white bg-black  
						focus:outline-none focus:border-accents-7 focus:shadow-outline-gray 
						active:bg-white active:text-black bg-opacity-75 hover:opacity-75 cursor-not-allowed`,
					},
					secoundry: {
						active: 'border border-accents-2 text-accents-5 bg-white hover:text-black hover:border-black focus:outline-none focus:border-accents-7 focus:shadow-outline-gray active:text-accents-8 active:bg-gray-50',
						disabled: 'border border-accents-2 text-accents-5 bg-white hover:text-black hover:border-accents-4 focus:outline-none focus:border-accents-7 focus:shadow-outline-gray active:text-accents-8 active:bg-gray-50 cursor-not-allowed',
					},
					transparent: {
						active: 'text-accents-5 bg-transparent hover:text-black focus:outline-none focus:border-accents-7 focus:shadow-outline-gray active:text-accents-8 active:bg-gray-50',
						disabled: 'text-accents-4 bg-transparent hover:text-opacity-50 cursor-not-allowed',
					}
				},
				sizes: {
					lg: 'px-5 py-3 text-lg',
					md: 'px-4 py-2 text-base',
					sm: 'px-3 py-2 text-sm leading-4',
					xs: 'px-2.5 py-1.5 text-xs leading-4',
				},
			}
		},
    	methods: {
    		clicked() {
    			this.$emit('clicked');
    		}
    	}
	}
</script> 