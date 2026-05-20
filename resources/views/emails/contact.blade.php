<!--
Email template
voor contactberichten.

Deze email wordt
verstuurd naar de admin
wanneer iemand
het contactformulier invult.
-->
<h1>Nieuw contactbericht</h1>

<p>
    <strong>Naam:</strong>
    <!--
Toont de inhoud
van het bericht
van de bezoeker.
-->
    {{ $data['name'] }}
</p>

<p>
    <strong>Email:</strong>
    {{ $data['email'] }}
</p>

<p>
    <strong>Bericht:</strong>
</p>

<p>
    {{ $data['message'] }}
</p>