@extends('app')

@section('contentheader-title')
{{ __('views.pages.contact_us.title') }}
@endsection


@section('contentheader-extra')

<link rel="stylesheet" href="static/css/animate.css">
<link rel="stylesheet" href="static/css/contact_us.css">

@endsection


@section('main-content')

<!-- Contact Form -->
<div class="c-form-container section-container section-container-image-bg">
  <div class="container">

    <div class="row">
      <div class="col-sm-10 col-lg-8 c-form section-description wow fadeIn mx-auto">
        <h1 class="text-capitalize">
          <strong>{{ __('views.pages.contact_us.title') }}</strong>
        </h1>
        <p>{{ __('views.pages.contact_us.title_send_your_message') }}</p>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-10 col-lg-6 c-form-box wow fadeInUp mx-auto">
        @include('partials.feedback_message')

        <div class="c-form-top">
          <div class="c-form-top-left">
            <h3>{{ __('views.pages.contact_us.title') }}</h3>
            <p>{{ __('views.pages.contact_us.fill_form_helper') }}:</p>
          </div>
          <div class="c-form-top-right">
            <div class="c-form-top-right-icon">
              <i class="fa fa-paper-plane"></i>
            </div>
          </div>
        </div>
        <div class="c-form-bottom">
          <form action="{{ route('contact_us.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
              <label for="c-form-name">
                <span class="label-text">{{ __('validation.attributes.name') }}:</span>
              </label>

              <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="{{ __('views.pages.contact_us.inputs.name_placeholder') }}"
                class="form-control {{ $errors->has('name') ? ' has-error' : '' }}"
                id="c-form-name"
                required
              >

              @error('name')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="c-form-email">
                <span class="label-text">{{ __('validation.attributes.email') }}:</span>
              </label>

              <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="{{ __('views.pages.contact_us.inputs.email_placeholder') }}"
                class="form-control {{ $errors->has('email') ? ' has-error' : '' }}"
                id="c-form-email"
                required
              >

              @error('email')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="c-form-masked-phone-number">
                <span class="label-text">{{ __('validation.attributes.phone_number') }}:</span>
              </label>

              <input
                type="text"
                name="maked_phone_number"
                value="{{ old('phone_number') }}"
                placeholder="{{ __('views.pages.contact_us.inputs.phone_number_placeholder') }}"
                class="form-control {{ $errors->has('phone_number') ? ' has-error' : '' }}"
                id="c-form-masked-phone-number"
                required
              >

              @error('phone_number')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <input id="c-form-phone-number" type="text" name="phone_number" hidden value="{{ old('phone_number') }}">

            <div class="form-group">
              <label for="c-form-message">
                <span class="label-text">{{ __('validation.attributes.message') }}:</span>
              </label>

              <textarea
                name="message"
                placeholder="{{ __('views.pages.contact_us.inputs.message_placeholder') }}"
                class="form-control {{ $errors->has('message') ? ' has-error' : '' }}"
                id="c-form-message"
                required>{{
                old('message')
                }}</textarea
              >

              @error('message')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>
                <span class="label-text">{{ __('validation.attributes.attachment') }}:</span>
              </label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <button
                    class="btn btn-outline-secondary"
                    type="button"
                    id="inputGroupFileAddon"
                    onclick="performClick('c-form-attachment');"
                  >
                    {{ __('views.pages.contact_us.inputs.file_input_prepend') }}
                  </button>
                </div>

                <div class="custom-file">
                  <input
                    name="attachment"
                    type="file"
                    class="custom-file-input"
                    id="c-form-attachment"
                    accept=".pdf,.doc,.docx,.odt,.txt"
                    aria-describedby="inputGroupFileAddon"
                    required
                  >
                  <label class="custom-file-label d-flex align-items-center" for="c-form-attachment">
                    {{ __('views.pages.contact_us.inputs.attachment_placeholder') }}
                  </label>
                </div>
              </div>

              @error('attachment')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn mt-3">{{ __('views.pages.contact_us.submit_button') }}</button>
          </form>
        </div>

      </div>
    </div>

  </div>
</div>

@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
  integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.0.5/imask.min.js"
  integrity="sha512-0ctiD2feH7vdHZ5jjAKNYts4h+IBRq7Nm5wACMJG1Pj5AQyprSHzX/ijMm77AcLLW5cemQptH+9EcviiKCC0cQ=="
  crossorigin="anonymous"></script>

<script type="text/javascript">
  (function() {
    window.onload = function() {
      new WOW().init();

      var phoneMask = IMask(
        document.getElementById('c-form-masked-phone-number'), {
        mask: [
          { mask: '(00) 0000-0000' },
          { mask: '(00) 00000-0000' },
        ]
      });

      /**
       * Fill right phone number input with the unmasked value
      */
      phoneMask.on('accept', function() {
        document.getElementById('c-form-phone-number').value = phoneMask.unmaskedValue;
      });

      /**
       * Set label content with the selected file:
      */
      document.getElementById('c-form-attachment').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        e.target.nextElementSibling.innerText = fileName;
      })
    };
  })();
  
  function performClick(elemId) {
    var elem = document.getElementById(elemId);
    if(elem && document.createEvent) {
      var evt = document.createEvent("MouseEvents");
      evt.initEvent("click", true, false);
      elem.dispatchEvent(evt);
    }
  }
</script>

@endsection