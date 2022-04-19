<div class="storycreation">
  <div class="storycreation-inner">
    <h2 class="storycreation-formtitle">Your Information</h2>
    <form $FormAttributes>
      <fieldset class="storycreation-formupper">

        <div class="storyform-label">Name</div>
        $Fields.dataFieldByName('Name')

        <div class="storyform-label">Email</div>
        $Fields.DataFieldByName('Email')

        <div class="storyform-label">Phone Number</div>
        $Fields.DataFieldByName('PhoneNumber')

        <h2 class="storycreation-formtitle">Your story</h2>
        <div class="storycreation-formlower">
          <div class="storyform-label">Story Type</div>
          $Fields.DataFieldByName('StoryType')

          <div class="storyform-label">Title</div>
          $Fields.DataFieldByName('Title')

          <div class="storyform-label">Date</div>
          $Fields.DataFieldByName('Date')

          <div class="storyform-label large">Story</div>
          <div class="storyform-label smol">provide as much information as you’d like</div>
          $Fields.DataFieldByName('Content')


          <div class="storyform_fileupload">
            <div class="storyform-label">If you have a photo or video to share, please upload or link it here</div>
            $Fields.DataFieldByName('Image')
          </div>

          <div class="storyform-label">Video Link</div>
          $Fields.DataFieldByName('VideoLink')
          $Fields.DataFieldByName('Subsite')
          $Fields.dataFieldByName('SecurityID')
          $Fields.dataFieldByName('Captcha')
          <% loop $Actions %>
            $Field
          <% end_loop %>
        </div>
      </fieldset>
    </form>
  </div>
</div>