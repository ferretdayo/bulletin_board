		function loadJSON(url) {
			return new Promise(function (ful, rej) {
			var xhr = new XMLHttpRequest
			xhr.open('GET', url)
			xhr.responseType = 'json'
			xhr.onloadend = function () {
				if (xhr.status != 200) return rej(Error(404))
				ful(xhr.response)
			}
			xhr.send()
			})
		}
