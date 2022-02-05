<p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl mt-10 text-center">CONTACT</p>

<section class="w-full max-w-2xl px-6 py-4 mx-auto bg-white rounded-md shadow-md dark:bg-slate-50">

    <h2 class="text-3xl font-semibold text-center ">Get in touch</h2>

    <div class="grid items-center grid-cols-1 gap-6 mt-6 sm:grid-cols-1 md:grid-cols-1">
        <a href="#" class="flex flex-col items-center px-4 py-3  transition-colors duration-200 transform rounded-md dark:bg-slate-200 hover:bg-blue-200 dark:hover:bg-blue-500">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
            </svg>

            <span class="mt-2">folkqq@houtlook.com</span>
        </a>
    </div>
    <form method="POST" action="{{ url('contectstore')  }}">
        @csrf
    <div class="mt-6 ">
        <div class="items-center -mx-2 md:flex">
            <div class="w-full mx-2">
                <label class="block mb-2 text-sm font-medium ">Name</label>

                <input id="name" name="name" class="block w-full px-4 py-2 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="text">
            </div>

            <div class="w-full mx-2 mt-4 md:mt-0">
                <label class="block mb-2 text-sm font-medium ">E-mail</label>

                <input id="email" name="email" class="block w-full px-4 py-2 bg-white border rounded-md  focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="email">
            </div>
            <div class="w-full mx-2 mt-4 md:mt-0">
                <label class="block mb-2 text-sm font-medium ">Company </label>

                <input id="company" name="company" class="block w-full px-4 py-2 bg-white border rounded-md  focus:border-blue-400 focus:ring-blue-300 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40" type="text">
            </div>
        </div>

        <div class="w-full mt-4">
            <label class="block mb-2 text-sm font-medium ">Message</label>

            <textarea id="detail" name="detail" class="block w-full h-40 px-4 py-2  bg-white border rounded-md  focus:border-blue-400 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"></textarea>
        </div>

        <div class="flex justify-center mt-6">
            <button class="px-4 py-2 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Send Message</button>
        </div>
    </div>
    </form>
</section>
