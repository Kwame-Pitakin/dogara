 @extends('admin.layouts.layout')

 @section('content')
     <style>
         #check_password {
             font-size: 12px;
         }

         .error {
             color: red;
             font-size: 12px;
         }

         @media (min-width: 992px) {


             .container-xxl {
                 padding-right: 15.875rem;
                 padding-left: 15.875rem;
             }

         }
     </style>

     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y ">
         <br>

         <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'account' }" class="row">

             <div class="col-md-12">
                 <ul class="nav nav-pills flex-column flex-md-row mb-3">
                     <li class="nav-item">


                         <a class="nav-link active" :class="{ 'active': tab === 'account' }"
                             @click.prevent="tab = 'account'; window.location.hash = 'account'" href="javascript:void(0);"><i
                                 class="bx bx-user me-1"></i> Account</a>

                     </li>
                     <li class="nav-item">
                         <a class="nav-link" :class="{ 'active': tab === 'security' }"
                             @click.prevent="tab = 'security'; window.location.hash = 'security'"
                             href="javascript:void(0);"><i class="bx bx-lock-alt me-1"></i>
                             Security</a>
                     </li>

                 </ul>
                 <div x-show="tab === 'account'">

                     <div class="card mb-4">
                         <h5 class="card-header">Profile Details</h5>
                         <!-- Account -->
                         <form id="formAuthentication" class="add-new-user pt-0" action="{{ route('admin.updateProfile') }}" method="POST"
                             enctype="multipart/form-data">
                             @csrf
                             <div class="card-body">
                                 <div class="d-flex align-items-start align-items-sm-center gap-4">
                                     <img src="{{ asset(Auth::guard('admin')->user()->avatar) }}" alt="user-avatar"
                                         class="d-block rounded" height="100" width="100"
                                         onerror="this.onerror=null;this.src='{{ asset('assets/img/avatars/avatar-placeholder.jpeg') }}';"
                                         id="uploadedAvatar" />

                                    
                                     <div class="button-wrapper">
                                         <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                             <span class="d-none d-sm-block">Upload new photo</span>
                                             <i class="bx bx-upload d-block d-sm-none"></i>
                                             <input type="file" id="upload" class="account-file-input" hidden
                                                 accept="image/png, image/jpeg" name="avatar" />
                                         </label>
                                         <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                                             <i class="bx bx-reset d-block d-sm-none"></i>
                                             <span class="d-none d-sm-block">Reset</span>
                                         </button>

                                         <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>

                                         @error('avatar')
                                         <p class="error">{{ $message }}</p>
                                     @enderror
                                     </div>
                                    
                                 </div>
                             </div>
                             <hr class="my-0" />
                             <div class="card-body" style="padding-left: 10rem;padding-right: 10rem">


                                 <div class="mb-3">
                                     <label for="fullname" class="form-label">Full Name</label>
                                     <input type="text" class="form-control" id="userFullname" name="userFullname"
                                         placeholder="Enter your username" autofocus required
                                         value="{{ Auth::guard('admin')->user()->name }}" readonly />
                                     @error('userFullname')
                                         <p class="error">{{ $message }}</p>
                                     @enderror
                                 </div>
                                 <div class="mb-3">
                                     <label for="Email" class="form-label">User Email</label>
                                     <input type="text" class="form-control" id="userEmail" name="userEmail"
                                         placeholder="Enter your user email" required
                                         value="{{ Auth::guard('admin')->user()->email }}" />
                                     @error('userEmail')
                                         <p class="error">{{ $message }}</p>
                                     @enderror
                                 </div>


                                 <div class="mb-3 ">
                                     <label class="userContact" for="userContact">Contact Number</label>
                                     <div class="input-group input-group-merge">
                                         <span class="input-group-text">
                                             <i class="fi fi-gh fis rounded-circle fs-3 me-1"></i> &nbsp
                                             (+233)</span>
                                         <input class="form-control mobile-number" type="number"   id="userContact"
                                             name="userContact" placeholder="202 555 0111" 
                                             value="{{ Auth::guard('admin')->user()->phone }}" min="9" max="10" required />
                                     </div>
                                     @error('userContact')
                                         <p class="error">{{ $message }}</p>
                                     @enderror

                                 </div>
                                 {{-- 
                                 <div class="mb-3">
                                     <label class="form-label" for="user-role">User Role</label>

                                     <select id="user-role" class="select2 form-select" name="role">
                                         <option value="">Select</option>
                                         </option>
                                         <option value="Front Desk" {{ old('role') === 'Front Desk' ? 'selected' : '' }}>
                                             Front Desk
                                         </option>
                                         <option value="Lab Technician"
                                             {{ old('role') === 'Lab Technician' ? 'selected' : '' }}> Lab Technician
                                         </option>
                                         </option>
                                     </select>
                                     @error('role')
                                         <p class="error">{{ $message }}</p>
                                     @enderror
                                 </div> --}}
                                 {{-- 
                                 <div class="mb-3">
                                     <label class="form-label" for="add-user-location">Location</label>
                                     <input type="text" id="add-user-location" class="form-control"
                                         placeholder="Enter Your Google Map Location" aria-label="User Location"
                                         name="userLocation" value="{{ old('userLocation') }}" />
                                     @error('userLocation')
                                         <p class="error">{{ $message }}</p>
                                     @enderror
                                 </div> --}}

                                 <br><br>
                                 <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                                 <button type="reset" class="btn btn-label-secondary" style="float: right"
                                     data-bs-dismiss="offcanvas">Cancel</button>
                         </form>
                     </div>
                     <!-- /Account -->
                 </div>
                 <div class="card">
                     {{-- <h5 class="card-header">Delete Account</h5> --}}
                     {{-- <div class="card-body">
                             <div class="mb-3 col-12 mb-0">
                                 <div class="alert alert-warning">
                                     <h6 class="alert-heading mb-1">Are you sure you want to delete your account?</h6>
                                     <p class="mb-0">Once you delete your account, there is no going back. Please be
                                         certain.
                                     </p>
                                 </div>
                             </div>
                             <form id="formAccountDeactivation" onsubmit="return false">
                                 <div class="form-check mb-3">
                                     <input class="form-check-input" type="checkbox" name="accountActivation"
                                         id="accountActivation" />
                                     <label class="form-check-label" for="accountActivation">I confirm my account
                                         deactivation</label>
                                 </div>
                                 <button type="submit" class="btn btn-danger deactivate-account">Deactivate
                                     Account</button>
                             </form>
                         </div> --}}
                 </div>
             </div>


             <!-- Security -->
             <div x-show="tab === 'security'">
                 {{-- change password --}}
                 <div class="card mb-4">
                     <h5 class="card-header">Change Password</h5>
                     <div class="card-body">
                         <form id="formAccountSettingsXX" name="update-admin-password"
                             action="{{ route('admin.updatePassword') }}" method="POST">
                             @csrf
                             <div class="row">
                                 <div class="mb-3 col-md-6 form-password-toggle">
                                     <label class="form-label" for="currentPassword">Current Password</label>
                                     <div class="input-group input-group-merge">
                                         <input class="form-control" type="password" name="currentPassword"
                                             id="currentPassword"
                                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                             value="{{ old('currentPassword') }}" />
                                         <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i>
                                         </span>

                                     </div>
                                     <span id="check_password"></span>
                                     @error('currentPassword')
                                         <p class="error">{{ $message }}</p>
                                     @enderror

                                 </div>
                             </div>
                             <div class="row">
                                 <div class="mb-3 col-md-6 form-password-toggle">
                                     <label class="form-label" for="newPassword">New Password</label>
                                     <div class="input-group input-group-merge">
                                         <input class="form-control" type="password" id="newPassword" name="newPassword"
                                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                             value="{{ old('newPassword') }}" />
                                         <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                     </div>
                                     @error('newPassword')
                                         <p class="error">{{ $message }}</p>
                                     @enderror
                                 </div>

                                 <div class="mb-3 col-md-6 form-password-toggle">
                                     <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                     <div class="input-group input-group-merge">
                                         <input class="form-control" type="password" name="confirmPassword"
                                             id="confirmPassword"
                                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                             value="{{ old('confirmPassword') }}" />
                                         <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                     </div>
                                     @error('confirmPassword')
                                         <p class="error">{{ $message }}</p>
                                     @enderror
                                 </div>
                                 <div class="col-12 mb-4">
                                     <p class="fw-semibold mt-2">Password Requirements:</p>
                                     <ul class="ps-3 mb-0">
                                         <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                         <li class="mb-1">At least one lowercase character</li>
                                         <li>At least one number, symbol, or whitespace character</li>
                                     </ul>
                                 </div>
                                 <div class="col-12 mt-1">
                                     <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                     <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 {{-- / change password --}}
                 <!-- Two-steps verification -->
                 <div class="card mb-4">
                     <h5 class="card-header">Two-steps verification</h5>
                     <div class="card-body">
                         <p class="fw-semibold mb-3">Two factor authentication is not enabled yet.</p>
                         <p class="w-75">
                             Two-factor authentication adds an additional layer of security to your account by requiring
                             more
                             than just a password to log in.
                             <a href="javascript:void(0);">Learn more.</a>
                         </p>
                         <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#enableOTP">
                             Enable two-factor authentication
                         </button>
                     </div>
                 </div>
                 <!-- Modal -->
                 <!-- Enable OTP Modal -->
                 <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
                     <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                         <div class="modal-content p-3 p-md-5">
                             <div class="modal-body">
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                     aria-label="Close"></button>
                                 <div class="text-center mb-4">
                                     <h3 class="mb-4">Enable One Time Password</h3>
                                 </div>
                                 <h6>Verify Your Mobile Number for SMS</h6>
                                 <p>
                                     Enter your mobile phone number with country code and we will send you a
                                     verification code.
                                 </p>
                                 <form id="enableOTPForm" class="row g-3 mt-3" onsubmit="return false">
                                     <div class="col-12">
                                         <label class="form-label" for="modalEnableOTPPhone">Phone Number</label>
                                         <div class="input-group input-group-merge">
                                             <span class="input-group-text">+1</span>
                                             <input type="text" id="modalEnableOTPPhone" name="modalEnableOTPPhone"
                                                 class="form-control phone-number-otp-mask" placeholder="202 555 0111" />
                                         </div>
                                     </div>
                                     <div class="col-12">
                                         <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                         <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                             aria-label="Close">
                                             Cancel
                                         </button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!--/ Enable OTP Modal -->

                 <!-- /Modal -->

                 <!--/ Two-steps verification -->
             </div>
             <!--/ Security -->
         </div>
     </div>
     </div>


     <script>
         // Update/reset user image of account page
         let accountUserImage = document.getElementById('uploadedAvatar');
         const fileInput = document.querySelector('.account-file-input'),
             resetFileInput = document.querySelector('.account-image-reset');

         if (accountUserImage) {
             const resetImage = accountUserImage.src;
             fileInput.onchange = () => {
                 if (fileInput.files[0]) {
                     accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                 }
             };
             resetFileInput.onclick = () => {
                 fileInput.value = '';
                 accountUserImage.src = resetImage;
             };
         }
     </script>
 @endsection

 <!-- / Content -->
