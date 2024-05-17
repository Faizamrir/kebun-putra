<div x-show="showImageModal" name="modal image" class="flex overflow-y-auto overflow-x-hidden inset-0 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-full">
 
    <div @click="showImageModal = false" class="fixed inset-0 bg-black opacity-0"></div>
        <!-- The close button -->
    <a @click="showImageModal = false" class="fixed z-90 top-6 right-8 text-white text-5xl font-bold" >×</a>
 
        <!-- A big image will be displayed here -->
    <img :src="images ? `{{ asset('storage/images/') }}` +'/'+ images : ''" alt="Laravel" id="modal-img" class="max-w-[800px] max-h-[600px] object-cover"/>
                         
</div>