<div style="display: <?php if (isset($log_error)) echo $log_error ?>; width: 20%; height: 100px; position: fixed;left: 80%;" class="swal2-container swal2-top-end swal2-backdrop-hidden">
    <div style=" display: flex;width: 100%;background-color: #333333; " aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-icon-error swal2-show" tabindex="-1" role="alert" aria-live="polite">
        <div class="swal2-header">
            <ul class="swal2-progress-steps" style="display: none;"></ul>
            <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                    <span class="swal2-x-mark-line-left"></span>
                    <span class="swal2-x-mark-line-right"></span>
                </span>
            </div><img class="swal2-image" style="display: none;">
            <h2 class="swal2-title ml-3" id="swal2-title" style="display: flex; display: flex;color: white;"><?php if (isset($mesError)) echo $mesError ?></h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
        </div>
    </div>
</div>
<div style="display: <?php if (isset($log_success)) echo $log_success ?>; width: 20%; height: 100px; position: fixed;left: 80%; " class="swal2-container swal2-top-end swal2-backdrop-hidden">
    <div style=" display: flex;width: 100%;background-color: #333333; " aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-icon-success swal2-hidden" tabindex="-1" role="alert" aria-live="polite">
        <div class="swal2-header">
            <ul class="swal2-progress-steps" style="display: none;"></ul>
            <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                <div class="swal2-success-ring"></div>
                <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
            </div><img class="swal2-image" style="display: none;">
            <h2 class="swal2-title ml-3" id="swal2-title" style="display: flex; display: flex;color: white;"> <?php if (isset($mesSuccess)) echo $mesSuccess ?></h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
        </div>
    </div>
</div>

<div id="swa_note" style="display: <?php if (isset($log_note)) echo $log_note ?>; width: 20%; height: 100px; position: fixed;left: 80%;" class="swal2-container swal2-top-end swal2-backdrop-hidden">
    <div style=" display: flex;width: 100%;background-color: #333333; " aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-icon-warning swal2-show" tabindex="-1" role="alert" aria-live="polite">
        <div class="swal2-header">
            <ul class="swal2-progress-steps" style="display: none;"></ul>
            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                <div class="swal2-icon-content">!</div>
            </div><img class="swal2-image" style="display: none;">
            <h2 class="swal2-title ml-3" id="swal2-title" style="display: flex;color: white;"><?php if (isset($mesNote)) echo $mesNote ?></h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
        </div>
    </div>
</div>
<div id="noteError" style=" display: none;width: 20%; height: 100px; position: fixed;left: 80%;" class="swal2-container swal2-top-end swal2-backdrop-hidden">
    <div style=" display: flex;width: 100%;background-color: #333333; " aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-toast swal2-icon-info swal2-show" tabindex="-1" role="alert" aria-live="polite" style="width: 100%; display: flex;">
        <div class="swal2-header">
            <ul class="swal2-progress-steps" style="display: none;"></ul>
            <div class="swal2-icon swal2-info swal2-icon-show" style="display: flex;">
                <div class="swal2-icon-content">i</div>
            </div><img class="swal2-image" style="display: none;">
            <h2 id="titleError" class="swal2-title ml-3" id="swal2-title" style="display: flex;color: white;"></h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
        </div>
    </div>
</div>