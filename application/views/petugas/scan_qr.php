<main id='main'>
	<div class="card mb-3">
    <div class="card-header"><i class="fas fa-table"></i> Scan QR Code</div>
    <div class="card-body">
      <?php
        if ($this->session->pesan) {
          echo $this->session->pesan;  
        }
      ?>
      <a id="btn-scan-qr" class="btn btn-warning">Scan</a>

      <canvas hidden="" id="qr-canvas"></canvas>

      <div id="qr-result" hidden="">
        <b>Data:</b> <span id="outputData"></span>
      </div>
    </div>
  </div>
</main>
