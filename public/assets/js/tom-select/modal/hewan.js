 // INDUK
 document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect && (new TomSelect(el = document.getElementById('select-labels-modal-induk'), {
        copyClassesToDropdown: false,
        render:{
            item: function(data,escape) {
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
            option: function(data,escape){
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
        },
    }));
});
// ----------- STATUS -------------
// @formatter:off
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-modal-status")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});
// @formatter:on
// ----------- TIPE -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-modal-tipe")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});

// ----------- KANDANG -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-modal-kandang")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});

// ----------- KESEHATAN -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect(
            (el = document.getElementById("select-labels-modal-kesehatan")),
            {
                copyClassesToDropdown: false,
                render: {
                    item: function (data, escape) {
                        if (data.customProperties) {
                            return (
                                '<div><span class="dropdown-item-indicator">' +
                                data.customProperties +
                                "</span>" +
                                escape(data.text) +
                                "</div>"
                            );
                        }
                        return "<div>" + escape(data.text) + "</div>";
                    },
                    option: function (data, escape) {
                        if (data.customProperties) {
                            return (
                                '<div><span class="dropdown-item-indicator">' +
                                data.customProperties +
                                "</span>" +
                                escape(data.text) +
                                "</div>"
                            );
                        }
                        return "<div>" + escape(data.text) + "</div>";
                    },
                },
            }
        );
});

// ----------- PROGRAM -------------
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-labels-modal-program")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});

// @formatter:off
document.addEventListener("DOMContentLoaded", function () {
    var el;
    window.TomSelect &&
        new TomSelect((el = document.getElementById("select-modal-pemilik")), {
            copyClassesToDropdown: false,
            render: {
                item: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
                option: function (data, escape) {
                    if (data.customProperties) {
                        return (
                            '<div><span class="dropdown-item-indicator">' +
                            data.customProperties +
                            "</span>" +
                            escape(data.text) +
                            "</div>"
                        );
                    }
                    return "<div>" + escape(data.text) + "</div>";
                },
            },
        });
});
// @formatter:on
