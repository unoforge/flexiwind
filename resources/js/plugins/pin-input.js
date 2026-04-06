export function PinInputPlugin(Alpine) {
        Alpine.directive(
        "pin-input",
        (el, { expression }, { evaluate, cleanup }) => {
            let options = expression ? evaluate(expression) : {};
            let { validation = /.*/ } = options;
            let listeners = [];

            let state = {
                value: "",
                validation,
                isComplete: false,
                inputs: () => el.querySelectorAll("[data-pin-input]"),

                validateInputsLength() {
                    this.isComplete = [...this.inputs()].every(
                        (i) => i.value.trim() !== ""
                    );
                },

                updateValue() {
                    this.value = [...this.inputs()]
                        .map((i) => i.value)
                        .join("");
                    this.validateInputsLength();
                    el.dispatchEvent(
                        new CustomEvent("otp-change", { detail: this.value })
                    );
                },

                handleInput(e, index) {
                    this.updateValue();
                    if (e.target.value !== "") {
                        const next = this.inputs()[index + 1];
                        if (next) this.focusEnd(next);
                    }
                },

                focusEnd(input) {
                    input.focus();
                    requestAnimationFrame(() => {
                        input.select();
                    });
                },

                handlePaste(e) {
                    const paste = e.clipboardData
                        .getData("text")
                        .slice(0, this.inputs().length);

                    let j = 0;
                    for (let i = 0; i < paste.length; i++) {
                        const char = paste[i];
                        const input = this.inputs()[j];
                        if (input && this.validation.test(char)) {
                            input.value = char;
                            j++;
                        }
                    }
                    this.updateValue();
                },

                handleBackspace(e, index) {
                    if (e.target.value === "" && index > 0) {
                        const prev = this.inputs()[index - 1];
                        this.focusEnd(prev);
                    }
                    this.updateValue();
                },

                handleKeydown(e, index) {
                    if (
                        e.key.length === 1 && 
                        !this.validation.test(e.key)
                    ) {
                        e.preventDefault();
                        return;
                    }

                    if (e.key === "ArrowLeft" && index > 0) {
                        const prev = this.inputs()[index - 1];
                        this.focusEnd(prev);
                    } else if (
                        e.key === "ArrowRight" &&
                        index < this.inputs().length - 1
                    ) {
                        if (this.inputs()[index].value.trim() !== "") {
                            const next = this.inputs()[index + 1];
                            this.focusEnd(next);
                        }
                    }
                },

                handleFocus(e, index) {
                    const firstEmptyIndex = [...this.inputs()].findIndex(
                        (i) => i.value.trim() === ""
                    );

                    if (firstEmptyIndex !== -1 && index > firstEmptyIndex) {
                        e.preventDefault();
                        this.focusEnd(this.inputs()[firstEmptyIndex]);
                    }
                },
            };

            for (const [index, input] of state.inputs().entries()) {
                const onInput = (e) => state.handleInput(e, index);
                const onKeydown = (e) => {
                    if (e.key === "Backspace") state.handleBackspace(e, index);
                    else state.handleKeydown(e, index);
                };
                const onPaste = (e) => state.handlePaste(e);
                const onFocus = (e) => state.handleFocus(e, index);

                input.addEventListener("input", onInput);
                input.addEventListener("keydown", onKeydown);
                input.addEventListener("paste", onPaste);
                input.addEventListener("focus", onFocus);

                listeners.push({ input, onInput, onKeydown, onPaste, onFocus });
            }

            cleanup(() => {
                for (const {
                    input,
                    onInput,
                    onKeydown,
                    onPaste,
                    onFocus,
                } of listeners) {
                    input.removeEventListener("input", onInput);
                    input.removeEventListener("keydown", onKeydown);
                    input.removeEventListener("paste", onPaste);
                    input.removeEventListener("focus", onFocus);
                }
            });
        }
    );
}
