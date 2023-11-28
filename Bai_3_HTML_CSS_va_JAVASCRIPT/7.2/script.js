function checkAnswer() {
    let score = 0

    a = document.querySelector("input[type='radio'][name='1']:checked")
    cau1 = a != null ? a.value : ''
    a = document.querySelector("input[type='radio'][name='2']:checked")
    cau2 = a != null ? a.value : ''
    a = document.querySelector("input[type='radio'][name='3']:checked")
    cau3 = a != null ? a.value : ''
    a = document.querySelector("input[type='radio'][name='4']:checked")
    cau4 = a != null ? a.value : ''
    a = document.querySelector("input[type='radio'][name='5']:checked")
    cau5 = a != null ? a.value : ''
    answer = []
    answer.push(cau1, cau2, cau3, cau4, cau5)

    if (answer.includes('')) {
        alert('Check answer!!!!!')
        return
    }

    answer = answer.map(e => e.toLowerCase())

    const abcxyz = ['c', 'a', 'b', 'c', 'a']
    if (answer.toString() === abcxyz.toString()) {
        alert('Very well! 10000 point for you <3')
        location.href = location.href
        return
    }

    for (i = 0; i < 5; i++) {
        if (answer[i] === abcxyz[i]) {
            score++
        }
    }

    alert(score + ' point! Good luck')
    location.href = location.href

}