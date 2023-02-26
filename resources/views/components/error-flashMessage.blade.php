@if (session()->has('error-flashMessage'))
<style>
  .bs-toast{
    position:absolute; 
    right:0;
    z-index: 100;

   
  }
</style>

    {{-- flush message  --}}
    {{-- <div class="bs-toast  toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000"> --}}
    <div class="bs-toast  toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="20000" x-data="{show: true}" x-init="setTimeout(()=>show=false, 20000)" x-show="show" >
      
      <div class="alert alert-solid-danger alert-dismissible d-flex align-items-center" role="alert" style="color:rgb(242, 243, 244)">
        <h6 class="alert-heading pl-4">Error!!&nbsp;{{ session('error-flashMessage') }}</h6> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  </div>
  {{-- end flush message  --}}
  
@endif



