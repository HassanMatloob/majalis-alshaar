<h1 class="text-2xl font-bold mb-6">Profile Details</h1>

<div class="grid grid-cols-1 md:grid-cols-10 gap-5">
    <div class="col-span-7 bg-gray-200 p-8">
        <div class="grid grid-cols-1 sm:grid-cols-2">
            <div class="flex flex-col space-y-2 mb-10">
                <h3 class="font-semibold">Name</h3>
                <p class="text-gray-500">{{ $user->name }}</p>
            </div>
            
            <div class="flex flex-col space-y-2 mb-10">
                <h3 for="" class="font-semibold">Email Address</h3>
                <p class="text-gray-500">{{ $user->email }}</p>
            </div>
        </div>
        
        
        <div class="space-y-2">
            <h3 class="font-semibold">Password</h3>
            <button id="openModal" class="p-4 bg-primary hover:bg-primaryHover text-white text-base font-semibold rounded-lg">Change Password</button>
        </div>
    </div>


    <div class="md:col-span-3 space-y-3">
        <img src="https://images.pexels.com/photos/3785079/pexels-photo-3785079.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Profile Image" class="w-full h-[80%]">
        <button class="p-4 bg-primary hover:bg-primaryHover text-white text-base font-semibold rounded-lg">Change Image</button>
    </div>
</div>

<!-- Modal -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="passwordModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 justify-center items-center">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Change Password</h2>

        <div id="errorMessage" class="hidden bg-red-100 text-red-700 p-4 rounded-lg mb-4">
            <p>Error: <span id="errorText"></span></p>
        </div>
        <div id="successMessage" class="hidden bg-green-100 text-green-700 p-4 rounded-lg mb-4">
            <p>Password changed successfully!</p>
        </div>
        
        <form id="changePasswordForm" class="space-y-4">
            <div>
                <label for="currentPassword" class="block font-semibold">Current Password</label>
                <input type="password" id="currentPassword" name="currentPassword" 
                       class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>
            <div>
                <label for="newPassword" class="block font-semibold">New Password</label>
                <input type="password" id="newPassword" name="newPassword" 
                       class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>
            <div>
                <label for="confirmNewPassword" class="block font-semibold">Confirm New Password</label>
                <input type="password" id="confirmNewPassword" name="confirmNewPassword" 
                       class="w-full border border-gray-300 rounded-lg p-2 mt-1" required>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" id="closeModal" 
                        class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded-lg">Cancel</button>
                <button type="submit" id="submit" class="px-4 py-2 bg-primary hover:bg-primaryHover text-white rounded-lg">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Open Modal
        $('#openModal').on('click', function () {
            $('#passwordModal').removeClass('hidden').addClass('flex');
        });

        // Close Modal
        $('#closeModal').on('click', function () {
            $('#passwordModal').removeClass('flex').addClass('hidden');
            if (!$('#errorMessage').hasClass('hidden')) {
                $('#errorMessage').addClass('hidden');
            }
            if (!$('#successMessage').hasClass('hidden')) {
                $('#successMessage').addClass('hidden');
            }
            $('#changePasswordForm').trigger('reset');
        });

        // Handle Form Submit
        $('#changePasswordForm').on('submit', function (e) {
            e.preventDefault();

            if (!$('#errorMessage').hasClass('hidden')) {
                $('#errorMessage').addClass('hidden');
            }
            if (!$('#successMessage').hasClass('hidden')) {
                $('#successMessage').addClass('hidden');
            }

            let currentPassword = $('#currentPassword').val();
            let newPassword = $('#newPassword').val();
            let confirmNewPassword = $('#confirmNewPassword').val();

            if (newPassword !== confirmNewPassword) {
                $('#errorMessage').removeClass('hidden');
                $('#errorText').text('Passwords do not match!');
                return;
            }

            $('#submit').text('Submitting...').attr('disabled', true);
            $.ajax({
                url: "{{ route('admin.update.password') }}",
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    currentPassword: currentPassword,
                    newPassword: newPassword,
                    confirmNewPassword: confirmNewPassword
                }
            }).done(() => {
                $('#successMessage').removeClass('hidden');
                $('#changePasswordForm').trigger('reset');
            }).fail((error) => {
                if (error.status === 400) {
                    $('#errorMessage').removeClass('hidden');
                    $('#errorText').text(error.responseJSON.error);
                } else {
                    $('#errorMessage').removeClass('hidden');
                    $('#errorText').text('An error occurred.');
                }
            }).always(() => {
                $('#submit').text('Submit').attr('disabled', false);
            });
        });
    });

</script>

