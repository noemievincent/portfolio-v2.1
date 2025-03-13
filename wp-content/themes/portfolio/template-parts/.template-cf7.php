<div class=form-container>
    <div class="column-container">
        <label class="text-input"><span class="label-text required">{Nom} <span
                        class="label-hint">({obligatoire})</span></span>
            [text* fullname autocomplete:name] </label>
        <label class="text-input"><span class="label-text required">{E-mail} <span
                        class="label-hint">({obligatoire})</span></span>
            [email* email autocomplete:email] </label>
    </div>

    <label class="text-input"><span class="label-text">{Message}</span>
        [textarea message] </label>

    <div class="bottom-container">
        [acceptance accept class:accept-checkbox] {En cochant cette case et en soumettant ce formulaire, j'accepte que
        mes données personnelles soient utilisées pour me contacter dans le cadre de la demande indiquée dans ce
        formulaire. Mes informations ne seront pas utilisées à d'autres fins.} [/acceptance]

        <div class="submit-container">
            [submit "{Envoyer}"]
        </div>
    </div>
</div>

flamingo_email: "[email]"
flamingo_name: "[fullname]"
flamingo_subject: "Nouveau message de [fullname]"