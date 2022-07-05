<form method="POST">
    <div class="panel">
        <div class="panel-heading"> 
            {l s='Configuraion' mod='myfirstmodule'}
        </div>
        <div class="panel-body"> 
        
            <label for="print"> {l s='What to print?' mod='multipurpose'}</label>
            <input type="text" name="print" id="print" class="form-control" value="{$MYMODULE_STR}" />
        
        </div>
        <div  class="panel-footer">
            <button type="submit" name="savetest" class="btn btn-default pull-right">
                <i class="process-icon-save"></i>
                {l s='save' mod='myfirstmodule'}
            </button>
        </div>
    </div>
</form>
