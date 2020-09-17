function sendAjaxRequest(url, data, method = "post", callback = null) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    $.ajax({
        method: method,
        url: url,
        data: data,
        success: function(response) {
            callback && typeof callback == "function" && callback(response);
        },
        fail: function(response) {
            callback && typeof callback == "function" && callback(response);
        }
    });
}

function convert_to_json(inputs) {
    let obj = {};
    inputs.each(function() {
        // till length of 3 splits
        let splitted_key = $(this)
            .attr("name")
            .split("_");

        for (let i = 1; i < splitted_key.length; i++) {
            let key = splitted_key[i];

            if (i == splitted_key.length - 1) {
                let value = $(this).val();
                obj[key] = value;
            } else {
                let key2 = splitted_key[i + 1];
                let value = $(this).val();
                if (!obj.hasOwnProperty(key)) obj[key] = {};
                obj[key][key2] = value;
                break;
            }
        }
    });
    return obj;
}

function get_params(div_class) {
    let inputs = $(div_class + " input , " + div_class + " select");
    let data = {};
    console.log(inputs);
    inputs.each(function() {
        let name = $(this).attr("name");

        const splitting = name.split("_");
        if (splitting.length > 1) {
            let name_key = splitting[0];
            if (name_key.length > 0) {
                let json_inputs = $(
                    div_class + " [data-json*=" + name_key + "]"
                );
                if (json_inputs.length > 0)
                    data[name_key] = convert_to_json(json_inputs);
            }
        } else {
            data[name] = $(this).val();

            if ($(this).attr("type") == "checkbox")
                data[name] = $(this).is(":checked");
        }
    });
    return data;
}

///////  questions section

function submit_add_question(e) {
    e.preventDefault();

    let params = get_params(".question-form");
    $(".modal-loader").show();

    sendAjaxRequest("/questions/create", params, "post", function(res) {
        $(".modal-loader").hide();
        if (res.status) {
            location.reload();
        } else {
            console.log(res.message);
        }
    });
}

function submit_update_question(e, id) {
    e.preventDefault();

    let params = get_params(".question-update-form");
    $(".sidebar-loader").show();

    sendAjaxRequest(`/questions/${id}/update`, params, "post", function(res) {
        $(".sidebar-loader").hide();
        if (res.status) {
            $("[data-title-" + id + "]").html(res.data.title.en);
            $("[data-active-" + id + "]").html(
                `<span class="status--${
                    res.data.active ? "process" : "denied"
                }" data-active-${res.data.id}}>
				${res.data.active ? "Active" : "Disactive"}
				</span>`
            );
        } else {
            console.log(res.message);
        }
    });
}

function delete_question(id) {
    let conf = window.confirm("are you sure ?");
    if (!conf) return;

    sendAjaxRequest(`/questions/${id}/delete`, {}, "post", function(res) {
        if (res.status) {
            $("[data-id=" + id + "]").remove();
            $(".tooltip").remove();
        } else {
            console.log(res.message);
        }
    });
}

function edit_question(id) {
    sendAjaxRequest(`/questions/${id}/edit`, {}, "get", function(res) {
        $(".question-edit").html(res);
    });
}

///////  end questions section

///////  trends section

function submit_add_trend(e) {
    e.preventDefault();

    let params = get_params(".trend-form");
    $(".modal-loader").show();

    sendAjaxRequest("/trends/create", params, "post", function(res) {
        $(".modal-loader").hide();
        if (res.status) {
            location.reload();
        } else {
            console.log(res.message);
        }
    });
}

function submit_update_trend(e, id) {
    e.preventDefault();

    let params = get_params(".trend-update-form");

    $(".sidebar-loader").show();

    sendAjaxRequest(`/trends/${id}/update`, params, "post", function(res) {
        $(".sidebar-loader").hide();
        if (res.status) {
            $("[data-title-" + id + "]").html(res.data.title.en);
            $("[data-active-" + id + "]").html(
                `<span class="status--${
                    res.data.active ? "process" : "denied"
                }" data-active-${res.data.id}}>
				${res.data.active ? "Active" : "Disactive"}
				</span>`
            );
            if (res.profession) {
                append_added_profession_for_trend(res.profession);
                reset_add_profession_for_trend();
            }
        } else {
            console.log(res.message);
        }
    });
}

function delete_trend(id) {
    let conf = window.confirm("are you sure ?");
    if (!conf) return;

    sendAjaxRequest(`/trends/${id}/delete`, {}, "post", function(res) {
        if (res.status) {
            $("[data-id=" + id + "]").remove();
            $(".tooltip").remove();
        } else {
            console.log(res.message);
        }
    });
}

function edit_trend(id) {
    sendAjaxRequest(`/trends/${id}/edit`, {}, "get", function(res) {
        $(".trend-edit").html(res);
    });
}

function append_added_profession_for_trend(profession) {
    let target_html = $("#profession-area");
    let str = `
		<tr trend-profession-data-id="${profession.id}">
				<td style="text-align: left;display:flex;align-items:center;justify-content:space-between">
						<span>${profession.title["en"]}</span>
						<span><a href="#!" onclick="delete_profession('${profession.id}', true)" class="fa fa-times"></a></span>
				</td>
		</tr>`;
    $(str).insertBefore(target_html);
}

function reset_add_profession_for_trend() {
    let target_html = $("#profession-area");
    target_html.empty();
    target_html.append(`
		<td>
			<a href="#" class="btn btn-block btn-secondary" onclick="add_profession_for_trend(event)"><i class="fa fa-plus"></i></a>
		</td>
	`);
}

function add_profession_for_trend(e) {
    e.preventDefault();
    let target_html = $("#profession-area");
    target_html.empty();
    let new_prof = `
		<td style="text-align: left;">
			<div style="display:flex;flex-wrap:wrap;">
				<input type="text" name="profession-tit_en" data-json="profession-tit" placeholder="Profession English" class="form-control mb-2" required>
				<input type="text" name="profession-tit_he" data-json="profession-tit" placeholder="התמחות בעברית" class="form-control mb-2" required>
				<input type="text" name="profession-tit_ar" data-json="profession-tit" placeholder="التخصص بالعربية" class="form-control mb-2" required>
			</div>
    	</td>
	`;
    target_html.append(new_prof);
    $(e.target).hide();
}
///////  end trends section

////// professions section

function submit_add_profession(e) {
    e.preventDefault();

    let params = get_params(".profession-form");
    $(".modal-loader").show();

    sendAjaxRequest("/professions/create", params, "post", function(res) {
        $(".modal-loader").hide();
        if (res.status) {
            location.reload();
        } else {
            console.log(res.message);
        }
    });
}

function submit_update_profession(e, id) {
    e.preventDefault();

    let params = get_params(".profession-update-form");
    $(".sidebar-loader").show();

    sendAjaxRequest(`/professions/${id}/update`, params, "post", function(res) {
        $(".sidebar-loader").hide();
        if (res.status) {
            $("[data-title-" + id + "]").html(res.data.title.en);
            $("[data-active-" + id + "]").html(
                `<span class="status--${
                    res.data.active ? "process" : "denied"
                }" data-active-${res.data.id}}>
				${res.data.active ? "Active" : "Disactive"}
				</span>`
            );
        } else {
            console.log(res.message);
        }
    });
}

function delete_profession(id, nested = false) {
    let conf = window.confirm("are you sure ?");
    if (!conf) return;

    sendAjaxRequest(`/professions/${id}/delete`, {}, "post", function(res) {
        if (res.status) {
            if (nested) $("[trend-profession-data-id=" + id + "]").remove();
            else $("[data-id=" + id + "]").remove();
            $(".tooltip").remove();
        } else {
            console.log(res.message);
        }
    });
}

function edit_profession(id) {
    sendAjaxRequest(`/professions/${id}/edit`, {}, "get", function(res) {
        $(".profession-edit").html(res);
    });
}

////// end professions section


////// quizzes section
function delete_quiz(id) {
    let conf = window.confirm("are you sure ?");
    if (!conf) return;

    sendAjaxRequest(`/quizzes/${id}/delete`, {}, "post", function (res) {
        if (res.status) {
            $("[data-id=" + id + "]").remove();
            $(".tooltip").remove();
        } else {
            console.log(res.message);
        }
    });
}

function edit_quiz(id) {
    sendAjaxRequest(`/quizzes/${id}/edit`, {}, "get", function (res) {
        $(".quiz-edit").html(res);
    });
}
////// end quizzes section

////// search section


function search_in_table(e, modal) {
    let keyword = e.target.value;

    setTimeout(function () {
        sendAjaxRequest(`/search/${modal}`, { keyword }, "get", function (res) {
            $('#table-result').html(res);
        });
    }, 300);
}

function search_by_keyword(e) {

        let keyword = e.target.value;
        if (keyword.length < 1) {
            $("#search_result").html("");
            return;
        }
        setTimeout(function() {    
            sendAjaxRequest(`/search`, { keyword }, "get", function(res) {
                $("#search_result").html(res);
            });
        }, 300);
}


////// end search section
