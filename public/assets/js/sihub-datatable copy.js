// function sihubDrawCallback(settings) {
//     var pagination = $(this).closest('.card').find('.card-footer');
//     var tableInfo = this.api().page.info();

//     // Update table info
//     pagination.find('#tableInfo').html(
//         `Data ke ${tableInfo.start + 1} ke ${tableInfo.end} dari ${tableInfo.recordsTotal} data`
//     );

//     // Custom pagination
//     var paginationContainer = pagination.find('#tablePagination');
//     paginationContainer.empty();

//     // Previous button
//     paginationContainer.append(
//         `<li class="page-item ${tableInfo.page == 0 ? 'disabled' : ''}">
//             <a class="page-link" href="#" data-page="${tableInfo.page - 1}" tabindex="-1" ${tableInfo.page == 0 ? 'aria-disabled="true"' : ''}>
//                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
//                 sebelumnya
//             </a>
//         </li>`
//     );

//     // Page numbers
//     for (let i = 0; i < tableInfo.pages; i++) {
//         paginationContainer.append(
//             `<li class="page-item ${i == tableInfo.page ? 'active' : ''}">
//                 <a class="page-link" href="#" data-page="${i}">${i + 1}</a>
//             </li>`
//         );
//     }

//     // Next button
//     paginationContainer.append(
//         `<li class="page-item ${tableInfo.page == tableInfo.pages - 1 ? 'disabled' : ''}">
//             <a class="page-link" href="#" data-page="${tableInfo.page + 1}">
//                 selanjutnya
//                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
//             </a>
//         </li>`
//     );
// }

// // Event handler for custom pagination
// $(document).on('click', '#tablePagination .page-link', function (e) {
//     e.preventDefault();
//     const table = $('#tableBase').DataTable();
//     if (!$(this).closest('li').hasClass('disabled')) {
//         table.page($(this).data('page')).draw('page');
//     }
// });


function sihubDrawCallback(settings) {
    var table = $(this);
    var tableId = table.attr('id');
    var pagination = table.closest('.card').find('.card-footer');
    var tableInfo = this.api().page.info();
    
    // Update table info
    pagination.find('#tableInfo').html(
        `Data ke ${tableInfo.start + 1} ke ${tableInfo.end} dari ${tableInfo.recordsTotal} data`
    );
    
    // Custom pagination
    var paginationContainer = pagination.find('#tablePagination');
    paginationContainer.empty();
    
    // Previous button
    paginationContainer.append(
        `<li class="page-item ${tableInfo.page == 0 ? 'disabled' : ''}">
            <a class="page-link" href="#" data-page="${tableInfo.page - 1}" tabindex="-1" ${tableInfo.page == 0 ? 'aria-disabled="true"' : ''}>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
                sebelumnya
            </a>
        </li>`
    );
    
    // Page numbers
    for (let i = 0; i < tableInfo.pages; i++) {
        paginationContainer.append(
            `<li class="page-item ${i == tableInfo.page ? 'active' : ''}">
                <a class="page-link" href="#" data-page="${i}">${i + 1}</a>
            </li>`
        );
    }
    
    // Next button
    paginationContainer.append(
        `<li class="page-item ${tableInfo.page == tableInfo.pages - 1 ? 'disabled' : ''}">
            <a class="page-link" href="#" data-page="${tableInfo.page + 1}">
                selanjutnya
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
            </a>
        </li>`
    );
    
    // Apply checkbox logic after redraw
    applyCheckboxLogic(tableId);
}

// Event handler for custom pagination
$(document).on('click', '#tablePagination .page-link', function (e) {
    e.preventDefault();
    const table = $('#tableBase').DataTable();
    if (!$(this).closest('li').hasClass('disabled')) {
        table.page($(this).data('page')).draw('page');
    }
});

// Checkbox and button logic functions
function applyCheckboxLogic(tableId) {
    // Initial state check
    updateButtonStates(tableId);
    
    // Reset event handlers to prevent duplicates
    $(`#${tableId} thead input[type="checkbox"]`).off('change');
    $(`#${tableId} tbody input[type="checkbox"]`).off('change');
    
    // Attach event handlers
    $(`#${tableId} thead input[type="checkbox"]`).on('change', function() {
        const isChecked = $(this).prop('checked');
        $(`#${tableId} tbody input[type="checkbox"]`).prop('checked', isChecked);
        updateButtonStates(tableId);
    });
    
    $(`#${tableId} tbody input[type="checkbox"]`).on('change', function() {
        updateButtonStates(tableId);
    });
}

function updateButtonStates(tableId) {
    const $checkboxes = $(`#${tableId} tbody input[type="checkbox"]`);
    const $checkedBoxes = $checkboxes.filter(':checked');
    const checkedCount = $checkedBoxes.length;
    
    if (checkedCount === 1) {
        // Get the checked row
        const $checkedRow = $checkedBoxes.closest('tr');
        const checkedId = $checkedRow.find('.delete').data('id');
        
        // Disable action buttons on all other rows
        $(`#${tableId} tbody tr`).each(function() {
            const $row = $(this);
            const rowId = $row.find('.delete').data('id');
            
            if (rowId !== checkedId) {
                $row.find('.action-view, .action-edit, .action-delete').addClass('disabled');
                $row.find('.action-view, .action-edit').attr('onclick', 'return false;');
                $row.find('.action-delete').prop('disabled', true);
            } else {
                $row.find('.action-view, .action-edit, .action-delete').removeClass('disabled');
                $row.find('.action-view, .action-edit').removeAttr('onclick');
                $row.find('.action-delete').prop('disabled', false);
            }
        });
        
        // Enable the batch delete button
        $(`#deleteSelected_${tableId}`).prop('disabled', false);
        $(`#deleteSelected_${tableId}`).removeClass('disabled');
    } 
    else if (checkedCount > 1) {
        // Disable all action buttons if multiple rows selected
        $(`#${tableId} .action-view, #${tableId} .action-edit, #${tableId} .action-delete`).addClass('disabled');
        $(`#${tableId} .action-view, #${tableId} .action-edit`).attr('onclick', 'return false;');
        $(`#${tableId} .action-delete`).prop('disabled', true);
        
        // Enable batch delete button
        $(`#deleteSelected_${tableId}`).prop('disabled', false);
        $(`#deleteSelected_${tableId}`).removeClass('disabled');
    }
    else {
        // Enable all action buttons if no rows selected
        $(`#${tableId} .action-view, #${tableId} .action-edit, #${tableId} .action-delete`).removeClass('disabled');
        $(`#${tableId} .action-view, #${tableId} .action-edit`).removeAttr('onclick');
        $(`#${tableId} .action-delete`).prop('disabled', false);
        
        // Disable batch 
        $(`#deleteSelected_${tableId}`).prop('disabled', true);
        $(`#deleteSelected_${tableId}`).addClass('disabled');
    }
}


// Global utility function for checkbox handling - can be used by any page
window.initCheckboxHandlers = function(tableId) {
    if (!tableId) return;
    
    // Remove old handlers first to prevent duplicates
    $(`#${tableId} thead input[type="checkbox"]`).off('change');
    $(document).off('change', `#${tableId} tbody input[type="checkbox"]`);
    
    // Handle "select all" checkbox
    $(`#${tableId} thead input[type="checkbox"]`).on('change', function() {
        const isChecked = $(this).prop('checked');
        $(`#${tableId} tbody input[type="checkbox"]`).prop('checked', isChecked);
        
        // Trigger event that specific pages can listen for
        $(document).trigger('sihub:checkboxesChanged', [tableId, isChecked]);
    });
    
    // Handle individual checkboxes
    $(document).on('change', `#${tableId} tbody input[type="checkbox"]`, function() {
        $(document).trigger('sihub:checkboxesChanged', [tableId]);
    });
};

$(document).ready(function() {
    $('table.dataTable').each(function() {
        const tableId = $(this).attr('id');
        applyCheckboxLogic(tableId);
    });
    $('.dataTable').each(function() {
        const tableId = $(this).attr('id');
        if (window.initCheckboxHandlers) {
            window.initCheckboxHandlers(tableId);
        }
    });
});