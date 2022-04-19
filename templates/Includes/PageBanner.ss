<% if $PageBannerTitle %>
  <div class="page__banner banner <% if $PageBannerLink %>small<% end_if %>"
       <% if $PageBannerImage %>style="background-image: url($PageBannerImage.Link);"<% end_if %>>
    <% if $PageBannerVideo %>
      <video class="banner__video" src="$PageBannerVideo.URL" autoplay muted loop
             poster="$PageBannerGIF.URL"></video>
    <% end_if %>
    <div class="banner__container">
      <div class="banner__content">
        <h1 class="banner__title">$PageBannerTitle</h1>
        <% if $PageBannerSubtitle %>
          <div class="banner__subtitle">$PageBannerSubtitle</div>
        <% end_if %>
        <% if $PageBannerLink %>
          <% with $PageBannerLink %>
            <a href="$LinkURL" class="banner__link">$Title</a>
          <% end_with %>
        <% end_if %>

      </div>
    </div>
  </div>

<% end_if %>