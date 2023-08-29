

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .info {
        margin-bottom: 20px;
    }

    .info h4 {
        margin-bottom: 5px;
    }

    .signature {
        text-align: center;
        margin-top: 50px;
    }

    .date {
        text-align: right;
        margin-top: 30px;
    }
</style>

<div class="col-lg-6">
    <div class="info-box card">
        <div class="container">
        <div class="signature">

        <p>__________________________________</p>
        <h3>Responsável Técnico</h3>

    </div>
    </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="info-box card">
        <div class="container">
            <div class="signature">

        <p>__________________________________</p>
        <h3>Gestor Técnico</h3>
    </div>
    </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="info-box card">
        <br>
        <br>

        <div class="container">
            <div class="signature">
            <p>__________________________________</p>
            <h3>Responsável pela Entidade</h3>

            <p>Cuiabá - MT</p>
            Data: {{ \Carbon\Carbon::now()->format('d/m/Y') }}
        
        </div>
</div>

</div>

</div>