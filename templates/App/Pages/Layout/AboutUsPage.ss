<% include Header %>
<% include PageBanner %>
<div class="page__aboutus">

  <% if $Links %>
    <div class="page__links">
      <% loop $Links %>
        <a href="$LinkURL" class="c-button c-button--outlined page__link">$Title</a>
      <% end_loop %>
    </div>
  <% end_if %>

  <div class="aboutus__main">
    <% include DividerHorizontal %>
    <div class="aboutus__flexbox">
      <div class="aboutus__main-textbutton">
        <h1 class="aboutus__main-title">
          $FeatureTitle
        </h1>

        <div class="aboutus__main-content">
          $FeatureContent
        </div>

        <% if $FeatureLink %>
          <a href="$FeatureLink.URL" class="c-button aboutus__main-link mobile">$FeatureLink.Title</a>
        <% end_if %>
      </div>
      <% if $FeatureImage %>
        <img src="$FeatureImage.Fill(720,720).URL" alt="featureimage" class="aboutus__main-image">
      <% end_if %>
    </div>
  </div>

  <div class="aboutus__elemental">
    $ElementalArea
  </div>
</div>

<%--$NewsletterForm--%>
<% include Footer %>
<% include FloatingDonate %>