<form $FormAttributes>
  <fieldset class="detailform">
    <div class="detailform-section">
      <h2 class="detailform-title">Your Details</h2>
      <div class="detailform-label">Organisation</div>
      $Fields.DataFieldByName('Organisation')
<%--      <div class="detailform-dropdown">--%>
<%--        $Fields.DataFieldByName('UnknownField')--%>
<%--      </div>--%>
      <div class="detailform-label">Position</div>
      $Fields.DataFieldByName('Position')
      <div class="detailform-label">Order Number</div>
      $Fields.DataFieldByName('OrderNumber')
      <div class="detailform-label">Transport Day</div>
      $Fields.DataFieldByName('TransportDay')
    </div>


    <div class="detailform-section">
      <h2 class="detailform-title">PATIEnt Details</h2>
      <div class="detailform-gender">
        $Fields.DataFieldByName('GenderField')
      </div>
      <div class="detailform-label">First Name</div>
      $Fields.DataFieldByName('FirstName')
      <div class="detailform-label">Last Name</div>
      $Fields.DataFieldByName('LastName')
      <div class="detailform-label">NHI</div>
      $Fields.DataFieldByName('NHI')
      <div class="detailform-label">Date of Birth</div>
      $Fields.DataFieldByName('DateOfBirth')
    </div>

    <div class="detailform-section">
      <h2 class="detailform-title">Referrer's Details</h2>
      <div class="detailform-label">Referring Hospital</div>
      $Fields.DataFieldByName('ReferringHospital')
      <div class="detailform-label">Referring Doctor</div>
      $Fields.DataFieldByName('ReferringDoctor')
      <div class="detailform-label">Contact Number</div>
      $Fields.DataFieldByName('ReferringContactNumber')
      <div class="detailform-label">Contact Email</div>
      $Fields.DataFieldByName('ReferringContactEmail')
      <div class="detailform-label">Ward / Bed</div>
      $Fields.DataFieldByName('ReferringWardBed')
      <div class="detailform-label">Extension Number</div>
      $Fields.DataFieldByName('ReferringExtensionNumber')
    </div>

    <div class="detailform-section">
      <h2 class="detailform-title">Receiving Details</h2>
      <div class="detailform-label">Receiving Hospital</div>
      $Fields.DataFieldByName('ReceivingHospital')
      <div class="detailform-label">Receiving Doctor</div>
      $Fields.DataFieldByName('ReceivingDoctor')
      <div class="detailform-label">Contact Number</div>
      $Fields.DataFieldByName('ReceivingContactNumber')
      <div class="detailform-label">Ward / Bed</div>
      $Fields.DataFieldByName('ReceivingWardBed')
      <div class="detailform-label">Extension Number</div>
      $Fields.DataFieldByName('ReceivingExtensionNumber')
    </div>

    <div class="detailform-section">
      <h2 class="detailform-title">Medical Details</h2>
      <div class="detailform-label">Diagnosis / Clinical Condition / Medical History / Reason for Transfer:</div>
      $Fields.DataFieldByName('Diagnosis')

      <div class="detailform-label">Medications:</div>
      $Fields.DataFieldByName('Medications')

      <div class="detailform-label">Drug Allergies</div>
      $Fields.DataFieldByName('DrugAllergies')
      <div class="detailform-label">Weight</div>
      $Fields.DataFieldByName('Weight')
      <div class="detailform-label">Infection Status</div>
      <div class="detailform-infectionstatus">
        $Fields.DataFieldByName('InfectionStatus')
      </div>
      <div class="detailform-label">Mobility</div>
      <div class="detailform-mobility">
        $Fields.DataFieldByName('Mobility')
      </div>
      <div class="detailform-label">NFR/DFR in Place</div>
      <div class="detailform-nfrdfr">
        $Fields.DataFieldByName('NFRDFR')
      </div>
    </div>

    <div class="detailform-section">
      <h2 class="detailform-title">Support Person Details</h2>
      <div class="detailform-label">Name</div>
      $Fields.DataFieldByName('SupportName')
      <div class="detailform-label">Relationship</div>
      $Fields.DataFieldByName('SupportRelationship')
      <div class="detailform-label">Weight</div>
      $Fields.DataFieldByName('SupportWeight')

      <div class="detailform-supportnote">
        Please note: Transport of support person at discretion of crew on the day.
        Space limitations discussed: small bag, no aerosols (deodorant, shaving cream, helium balloons, cigarette
        lighter).
      </div>

      <h2 class="detailform-title">Documentation to be included</h2>
      <div class="detailform-documentation">
        $Fields.DataFieldByName('Documentation')
      </div>
    </div>

    <div class="detailform-section">
      <h2 class="detailform-title">If being charged to ACC</h2>
      <div class="detailform-label">ACC Number</div>
      $Fields.DataFieldByName('ACC')
      <div class="detailform-label">Transport Date</div>
      $Fields.DataFieldByName('TransportDate')
      <div class="detailform-label">Time</div>
      $Fields.DataFieldByName('TransportTime')
      <div class="detailform-label">Case Number</div>
      $Fields.DataFieldByName('CaseNumber')
      <div class="detailform-label">Contact Person</div>
      $Fields.DataFieldByName('ContactPerson')
    </div>

    <div class="detailform-section">
      <h2 class="detailform-title">Upload Files</h2>

      <div class="detailform_fileupload">
        $Fields.DataFieldByName('File1')
      </div>

      <div class="detailform_fileupload">
        $Fields.DataFieldByName('File2')
      </div>

      <div class="detailform_fileupload">
        $Fields.DataFieldByName('File3')
      </div>

      <div class="detailform_fileupload">
        $Fields.DataFieldByName('File4')
      </div>
    </div>

    $Fields.DataFieldByName('Subsite')

    <div class="detailform-confirmsection">
      <div class="detailform-confirm">
        <div class="detailform-confirminner">
          $Fields.DataFieldByName('Confirm')
          <div class="detailform-confirmtext">
            I confirm that all the details are ready to submit
          </div>
        </div>

      </div>
    </div>

    $Fields.dataFieldByName('SecurityID')
    $Fields.dataFieldByName('Captcha')
    <% loop $Actions %>
      $Field
    <% end_loop %>
  </fieldset>
</form>