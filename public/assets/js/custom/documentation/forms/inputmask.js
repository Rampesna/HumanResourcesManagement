"use strict";
var KTFormsInputmaskDemos = {
    init: function (a) {
        Inputmask({mask: "99/99/9999"}).mask("#kt_inputmask_1"), Inputmask({mask: "(999) 999-9999"}).mask("#kt_inputmask_2"), Inputmask({
            mask: "(999) 999-9999",
            placeholder: "(999) 999-9999"
        }).mask("#kt_inputmask_3"), Inputmask({
            mask: "9",
            repeat: 10,
            greedy: !1
        }).mask("#kt_inputmask_4"), Inputmask("decimal", {rightAlignNumerics: !1}).mask("#kt_inputmask_5"), Inputmask("€ 999.999.999,99", {numericInput: !0}).mask("#kt_inputmask_6"), Inputmask({mask: "999.999.999.999"}).mask("#kt_inputmask_7"), Inputmask({
            mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]",
            greedy: !1,
            onBeforePaste: function (a, t) {
                return (a = a.toLowerCase()).replace("mailto:", "")
            },
            definitions: {"*": {validator: '[0-9A-Za-z!#$%&"*+/=?^_`{|}~-]', cardinality: 1, casing: "lower"}}
        }).mask("#kt_inputmask_8")
    }
};
KTUtil.onDOMContentLoaded((function () {
    KTFormsInputmaskDemos.init()
}));