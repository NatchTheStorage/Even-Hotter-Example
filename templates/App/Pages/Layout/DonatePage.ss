<% include Header %>
<% include PageBanner %>
<div class="page__donate">
  <div class="donate__content">
    <div class="donate__content-text">
      <% include DividerHorizontal %>
      <div class="donate__content-title">$BlockTitle</div>
      <div class="donate__content-textcontent">$Content</div>
    </div>
    <div class="donate__content-donationblock">
      <div class="donate__content-stages">
        <div class="donate__content-stage active" id="choose">1. Choose</div>
        <div class="donate__content-stage" id="details">2. details</div>
        <div class="donate__content-stage" id="payment">3. payment</div>
      </div>
      <div class="donate__content-options">
        <div class="donate__content-option active" id="single">Single donation</div>
        <div class="donate__content-option" id="regular">Regular donation</div>
      </div>
      <h2 class="donate__content-amount">Choose your single amount</h2>
      <div class="donate__content-amountlist">
        <div class="amountlist-button" id="Donate25">$25</div>
        <div class="amountlist-button" id="Donate50">$50</div>
        <div class="amountlist-button" id="Donate100">$100</div>
        <div class="amountlist-button" id="Donate250">$250</div>
        <div class="amountlist-button" id="DonateCustom">IMG</div>
      </div>
    </div>
  </div>
</div>
<%--$NewsletterForm--%>
<% include Footer %>