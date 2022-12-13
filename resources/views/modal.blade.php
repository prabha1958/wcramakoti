<x-app-layout>

<div class="max-w-7xl mx-auto">
    <div class="mt-52">

<button class="px-6 py-3 bg-red-600 text-gray-100 rounded shadow" id="delete-btn">
    Delete
</button>

<div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
    <div class="bg-gray-200 max-w-sm py-2 px-3 rounded shadow-xl text-gray-800">
        <div class="flex justify-between items-center">
            <h4 class="text-lg font-bold">Confirm Delete?</h4>
            <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="mt-2 text-sm">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maiores, sunt.</p>
        </div>
        <div class="mt-3 flex justify-end space-x-3">
            <button class="px-3 py-1 rounded hover:bg-red-300 hover:bg-opacity-50 hover:text-red-900">Cancel</button>
            <button class="px-3 py-1 bg-red-800 text-gray-200 hover:bg-red-600 rounded">Delete</button>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', () =>{
        const overlay = document.querySelector('#overlay')
        const delBtn = document.querySelector('#delete-btn')
        const closeBtn = document.querySelector('#close-modal')

        const toggleModal = () => {
            overlay.classList.toggle('hidden')
            overlay.classList.toggle('flex')
        }

        delBtn.addEventListener('click', toggleModal)

        closeBtn.addEventListener('click', toggleModal)
    })

</script>
    </div>
</div>
</x-app-layout>


