<x-ui.modal modalId="search-modal">
    <x-ui.modal.content x-data="searchDocs" :closable="false" no-gutter size="md"
        class="animated-modal-content h-124 p-0.5" data-enter-animation="fadeIn .4s linear"
        data-exit-animation="fadeOut .1s linear">
        <x-ui.modal.header padding-none class="relative w-full">
            <x-ui.input @input="search" data-input-search un-stylled
                class="w-full ps-9 text-fg focus:outline-none border-0 ui-form-input-lg" placeholder="Search components, docs..."
                x-model="query" />
            <span aria-hidden="true"
                class="iconify ph--magnifying-glass absolute left-3.5 top-3 text-fg-muted text-sm"></span>
        </x-ui.modal.header>
        <x-ui.modal.body data-search-results
            class="[--gutter:--spacing(0)] overflow-y-auto bg-bg-surface border border-border ui-card [--card-radius:var(--global-main-radius)] [--card-padding:--spacing(0.5)] shadow-sm">
            <div x-show="results.length" class="px-1 space-y-0.5">
                <template x-for="item in results" :key="item.slug">
                    <a :href="item.slug"
                        class="flex w-full items-center gap-4 px-3 py-2 inner-radius hover:bg-bg-muted/40 relative before:absolute before:left-10 before:right-0 before:bottom-0 before:flex before:h-0.5 before:bg-gradient-to-l before:from-bg-muted/30 before:via-bg-muted/90 before:to-bg-muted/30">
                        <div class="flex min-w-max text-fg-muted">
                            <template x-if="item.isComponent && !item.isTheming">
                                <span class="iconify size-5 ph--cube"></span>
                            </template>
                            <template x-if="item.isTheming">
                                <span class="iconify size-5 ph--palette"></span>
                            </template>
                            <template x-if="item.isDocumentation && !item.isTheming">
                                <span class="iconify size-5 ph--file-text"></span>
                            </template>
                        </div>
                        <div class="flex-1 overflow-hidden flex flex-col">
                            <div class="text-sm font-medium text-fg-title line-clamp-1" x-text="item.title"></div>
                            <div class="text-xs text-fg-muted line-clamp-1" x-text="item.description"></div>
                        </div>
                    </a>
                </template>
            </div>
            <template x-if="query.length > 0 && results.length===0">
                <div class="size-full d-flex-place-center flex-col text-center py-4">
                    <svg width="128" height="128" viewBox="0 0 128 128" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_33_172)">
                            <circle cx="60.7768" cy="62.7768" r="60.7768" fill="currentColor" class="text-bg-muted/50 dark:text-border" />
                            <circle cx="60.7769" cy="62.7769" r="47.2709" fill="#E4ECFE" class="fill-bg-muted" />
                            <path
                                d="M32.6553 22H76.6738L91.6846 35.8574V100.793C91.6846 102.259 90.4956 103.448 89.0293 103.448H32.6553C31.1889 103.448 30 102.259 30 100.793V24.6553C30 23.2805 31.0449 22.1496 32.3838 22.0137L32.6553 22Z"
                                fill="currentColor" stroke="#B7CEFF"
                                class="text-bg-muted/70 dark:text-border stroke-primary-400 dark:stroke-primary-900" stroke-width="2" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M36.7851 39.0238C36.7851 38.0145 37.6033 37.1962 38.6127 37.1962H73.9995C75.0088 37.1962 75.8271 38.0145 75.8271 39.0238C75.8271 40.0332 75.0088 40.8514 73.9995 40.8514H38.6127C37.6033 40.8514 36.7851 40.0332 36.7851 39.0238ZM36.7851 50.2887C36.7851 49.2794 37.6033 48.4611 38.6127 48.4611H84.2731C85.2824 48.4611 86.1006 49.2794 86.1006 50.2887C86.1006 51.2981 85.2824 52.1163 84.2731 52.1163H38.6127C37.6033 52.1163 36.7851 51.2981 36.7851 50.2887ZM36.7851 61.5536C36.7851 60.5443 37.6033 59.726 38.6127 59.726H51.1693C52.1786 59.726 52.9969 60.5443 52.9969 61.5536C52.9969 62.563 52.1786 63.3812 51.1693 63.3812H38.6127C37.6033 63.3812 36.7851 62.563 36.7851 61.5536ZM57.3323 61.5536C57.3323 60.5443 58.1505 59.726 59.1598 59.726H84.2731C85.2824 59.726 86.1006 60.5443 86.1006 61.5536C86.1006 62.563 85.2824 63.3812 84.2731 63.3812H59.1598C58.1505 63.3812 57.3323 62.563 57.3323 61.5536ZM36.7851 72.8185C36.7851 71.8092 37.6033 70.9909 38.6127 70.9909H71.7165C72.7258 70.9909 73.544 71.8092 73.544 72.8185C73.544 73.8279 72.7258 74.6461 71.7165 74.6461H38.6127C37.6033 74.6461 36.7851 73.8279 36.7851 72.8185ZM77.8794 72.8185C77.8794 71.8092 78.6977 70.9909 79.707 70.9909H84.2731C85.2824 70.9909 86.1006 71.8092 86.1006 72.8185C86.1006 73.8279 85.2824 74.6461 84.2731 74.6461H79.707C78.6977 74.6461 77.8794 73.8279 77.8794 72.8185ZM36.7851 82.9569C36.7851 81.9476 37.6033 81.1293 38.6127 81.1293H80.8485C81.8579 81.1293 82.6761 81.9476 82.6761 82.9569C82.6761 83.9663 81.8579 84.7845 80.8485 84.7845H38.6127C37.6033 84.7845 36.7851 83.9663 36.7851 82.9569ZM36.7851 93.0953C36.7851 92.086 37.6033 91.2677 38.6127 91.2677H69.4334C70.4428 91.2677 71.261 92.086 71.261 93.0953C71.261 94.1047 70.4428 94.9229 69.4334 94.9229H38.6127C37.6033 94.9229 36.7851 94.1047 36.7851 93.0953Z"
                                fill="#B7CEFF" class="fill-primary-100 dark:fill-primary-900" />
                            <path
                                d="M36.7851 39.0238C36.7851 38.0145 37.6033 37.1962 38.6127 37.1962H73.9995C75.0088 37.1962 75.8271 38.0145 75.8271 39.0238C75.8271 40.0332 75.0088 40.8514 73.9995 40.8514H38.6127C37.6033 40.8514 36.7851 40.0332 36.7851 39.0238Z"
                                fill="#2D56B2" class="fill-primary" />
                            <path
                                d="M77.0635 21L92.6842 35.4191H81.0635C78.8544 35.4191 77.0635 33.6282 77.0635 31.4191V21Z"
                                fill="#B7CEFF" class="fill-primary-400 dark:fill-primary-900" />
                            <rect width="14.7292" height="2.53951" rx="1.26976"
                                transform="matrix(-0.707107 0.707107 0.707107 0.707107 20.4151 23.0001)" fill="#2D56B2"
                                class="fill-primary" />
                            <rect width="14.7292" height="2.53951" rx="1.26976"
                                transform="matrix(0.707107 0.707107 0.707107 -0.707107 10 24.7957)" fill="#2D56B2"
                                class="fill-primary" />
                            <circle cx="26.3412" cy="58.3412" r="4.3412" stroke="#5388FE" stroke-width="4"
                                class="stroke-primary/80" />
                            <circle cx="116.608" cy="71.6078" r="3.60776" stroke="#2D56B2" stroke-width="4"
                                class="stroke-primary" />
                            <circle cx="10.1101" cy="79.1101" r="1.11008" stroke="#4F86FF" stroke-width="3"
                                class="stroke-primary/60" />
                            <path
                                d="M62.9146 125.958C84.7867 125.958 102.518 124.923 102.518 123.646C102.518 122.369 84.7867 121.334 62.9146 121.334C41.0425 121.334 23.3117 122.369 23.3117 123.646C23.3117 124.923 41.0425 125.958 62.9146 125.958Z"
                                fill="#B7CEFF" class="fill-primary-400 dark:fill-primary-900" />
                            <path
                                d="M83.7398 89.7785L89.6904 83.828L114.211 104.757C117.214 107.32 117.395 111.899 114.603 114.691C111.811 117.483 107.232 117.302 104.669 114.299L83.7398 89.7785Z"
                                fill="#1A3166" class="fill-primary/50" />
                            <path
                                d="M87.9646 94.7285L104.669 114.299C107.232 117.303 111.811 117.483 114.603 114.691C117.395 111.899 117.214 107.32 114.211 104.757L92.3642 86.1102C91.485 89.2797 89.9719 92.1976 87.9646 94.7285Z"
                                fill="#2D56B2" class="fill-primary" />
                            <path
                                d="M76.9452 54.0705L61.5646 89.7787C61.3278 89.5955 61.0931 89.4057 60.8626 89.2138C59.376 87.9566 58.0815 86.4796 57.0217 84.8315L70.3069 53.9876C72.5079 53.6253 74.7535 53.6533 76.9452 54.0705Z"
                                fill="white" class="fill-bg" />
                            <path
                                d="M87.8789 60.2655L73.418 93.8382C70.4143 93.8415 67.4501 93.1384 64.7547 91.7834L80.545 55.1219C83.3424 56.2403 85.8514 58 87.8789 60.2655Z"
                                fill="white" class="fill-bg" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M64.6269 59.0065C61.8267 60.829 59.6086 63.4658 58.2624 66.5909C56.916 69.7166 56.5053 73.184 57.0853 76.5524C57.6652 79.9205 59.2079 83.0292 61.5092 85.4882C63.8098 87.9464 66.7642 89.6445 69.995 90.3778C73.2253 91.111 76.5959 90.849 79.6834 89.6229L79.6837 89.6227C81.7347 88.8085 83.6127 87.5875 85.2089 86.0266C86.8053 84.4655 88.0885 82.595 88.9823 80.52C89.8761 78.4449 90.3622 76.208 90.4112 73.9373C90.4601 71.6666 90.0709 69.4095 89.267 67.2955L89.2669 67.2952C88.0565 64.1113 85.9536 61.3756 83.2334 59.4275C80.5141 57.48 77.2978 56.4049 73.9913 56.3302C70.6849 56.2556 67.4263 57.1844 64.6269 59.0065ZM53.0878 64.3619C54.8677 60.23 57.8105 56.7204 61.5534 54.2843C65.2971 51.8477 69.67 50.597 74.1185 50.6974C78.5669 50.7979 82.8805 52.2446 86.514 54.8469C90.1467 57.4485 92.9342 61.0862 94.5334 65.2932C95.5957 68.0869 96.1086 71.0652 96.0441 74.0587C95.9796 77.0523 95.3388 80.0051 94.1568 82.749C92.9748 85.493 91.2738 87.9762 89.1481 90.0549C87.0223 92.1337 84.5134 93.7673 81.763 94.8592C77.6202 96.5045 73.09 96.8578 68.7479 95.8723C64.4063 94.8869 60.457 92.6094 57.3955 89.338C54.3345 86.0674 52.2975 81.9497 51.5328 77.5084C50.7681 73.0674 51.3082 68.4933 53.0878 64.3619Z"
                                fill="#2D56B2" class="fill-primary" />
                            <path
                                d="M112.012 104.952L94.3452 90.4859C93.7976 90.0375 93.1596 90.6682 93.603 91.2196L107.869 108.963C108.419 109.648 109.214 110.092 110.042 110.179L110.532 110.23C112.223 110.407 113.496 109.07 113.247 107.378L113.189 106.985C113.074 106.209 112.649 105.474 112.012 104.952Z"
                                fill="#9FBDFF" />
                            <rect width="22.9185" height="3.95147" rx="1.97574"
                                transform="matrix(-0.707107 0.707107 0.707107 0.707107 80.2059 64.0001)"
                                fill="#2D56B2" class="fill-primary" />
                            <rect width="22.9185" height="3.95147" rx="1.97574"
                                transform="matrix(0.707107 0.707107 0.707107 -0.707107 64 66.7941)" fill="#2D56B2"
                                class="fill-primary" />
                            <rect width="12.8004" height="2.20696" rx="1.10348"
                                transform="matrix(-0.707107 0.707107 0.707107 0.707107 111.051 39.0001)"
                                fill="#5388FE" class="fill-primary/80" />
                            <rect width="12.8004" height="2.20696" rx="1.10348"
                                transform="matrix(0.707107 0.707107 0.707107 -0.707107 102 40.5606)" fill="#5388FE"
                                class="fill-primary/80" />
                            <rect width="10.8561" height="1.87174" rx="0.935869"
                                transform="matrix(-0.707107 0.707107 0.707107 0.707107 44.6765 109)" fill="#2D56B2"
                                class="fill-primary" />
                            <rect width="10.8561" height="1.87174" rx="0.935869"
                                transform="matrix(0.707107 0.707107 0.707107 -0.707107 37 110.324)" fill="#2D56B2"
                                class="fill-primary" />
                        </g>
                        <defs>
                            <clipPath id="clip0_33_172">
                                <rect width="128" height="128" fill="white" class="fill-bg" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="text-sm font-medium text-fg-title mt-3">
                        No result found
                    </span>
                    <span class="text-xs text-fg-muted mt-2">
                        No result found for <span x-text="query" class="font-medium text-fg"></span>
                    </span>
                    <x-ui.button x-on:click="clearSearch()" variant="outline" intent="white" size="sm" class="mt-4 w-max">
                        Clear search
                    </x-ui.button>
                </div>
            </template>
            <template x-if="query.length===0">
                <div class="size-full d-flex-place-center flex-col text-center py-4">
                    <svg width="128" height="128" viewBox="0 0 128 128" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M126 82.6C126 81.1641 124.836 80 123.4 80H9.67599C8.24005 80 7.07599 81.1641 7.07599 82.6C7.07599 84.0359 8.24004 85.2 9.67598 85.2H24.9198C26.3557 85.2 27.5198 86.3641 27.5198 87.8C27.5198 89.2359 26.3557 90.4 24.9198 90.4H21.8705C20.4346 90.4 19.2705 91.5641 19.2705 93C19.2705 94.4359 20.4346 95.6 21.8705 95.6H30.9198C32.3557 95.6 33.5198 96.7641 33.5198 98.2C33.5198 99.6359 32.3557 100.8 30.9198 100.8H26.8705C25.4346 100.8 24.2705 101.964 24.2705 103.4C24.2705 104.836 25.4346 106 26.8705 106H88.8043C90.2402 106 91.4043 104.836 91.4043 103.4C91.4043 101.964 90.2402 100.8 88.8043 100.8H75.1C73.6641 100.8 72.5 99.6359 72.5 98.2C72.5 96.7641 73.6641 95.6 75.1 95.6H115.303C116.739 95.6 117.903 94.4359 117.903 93C117.903 91.5641 116.739 90.4 115.303 90.4H101.852C100.416 90.4 99.2523 89.2359 99.2523 87.8C99.2523 86.3641 100.416 85.2 101.852 85.2H123.4C124.836 85.2 126 84.0359 126 82.6ZM41.8584 100.8C40.4224 100.8 39.2584 99.6359 39.2584 98.2C39.2584 96.7641 40.4224 95.6 41.8584 95.6H50.4C51.8359 95.6 53 96.7641 53 98.2C53 99.6359 51.8359 100.8 50.4 100.8H41.8584Z"
                            fill="#E4ECFE" class="fill-bg-muted" />
                        <path
                            d="M94.6322 103.4C94.6322 101.964 95.7963 100.8 97.2322 100.8H109.607C111.043 100.8 112.207 101.964 112.207 103.4C112.207 104.836 111.043 106 109.607 106H97.2322C95.7963 106 94.6322 104.836 94.6322 103.4Z"
                            fill="#E4ECFE" class="fill-bg-muted" />
                        <path
                            d="M13.4772 93C13.4772 91.5641 12.3131 90.4 10.8772 90.4H4.6C3.16406 90.4 2 91.5641 2 93C2 94.4359 3.16406 95.6 4.6 95.6H10.8772C12.3131 95.6 13.4772 94.4359 13.4772 93Z"
                            fill="#E4ECFE" class="fill-bg-muted" />
                        <rect x="32.3401" y="51.3849" width="31.2831" height="34.4114" fill="#5388FE"
                            class="fill-primary/80" />
                        <path d="M32.3402 51.3849H63.6233L55.0204 42H23.7373L32.3402 51.3849Z" fill="#2D56B2"
                            class="fill-primary" />
                        <path d="M32.3401 51.3849V62.7251H21L32.3401 51.3849Z" fill="#2D56B2" class="fill-primary" />
                        <rect x="63.6232" y="51.3849" width="35.9756" height="34.4114" fill="#2D56B2"
                            class="fill-primary" />
                        <path d="M63.6232 51.3849H99.5988L107.42 66.2444H71.444L63.6232 51.3849Z" fill="#88AAF4"
                            class="fill-primary-400 dark:fill-primary-600/80" />
                        <path d="M63.6232 51.3849H99.5988L107.42 44.3462H71.444L63.6232 51.3849Z" fill="#B7CEFF"
                            class="fill-primary-100 dark:fill-primary-900" />
                        <rect x="37" y="58" width="16" height="4" fill="#2D56B2" class="fill-primary" />
                        <path d="M26 28.1207L32.4807 34.224" stroke="#2D56B2" stroke-width="2" stroke-linecap="round"
                            class="stroke-primary" />
                        <path d="M38.7958 23L40.3815 30.7486" stroke="#2D56B2" stroke-width="2"
                            stroke-linecap="round" class="stroke-primary" />
                        <path d="M102.541 28.1207L96.0598 34.224" stroke="#2D56B2" stroke-width="2"
                            stroke-linecap="round" class="stroke-primary" />
                        <path d="M89.7448 23L88.1591 30.7486" stroke="#2D56B2" stroke-width="2"
                            stroke-linecap="round" class="stroke-primary" />
                    </svg>
                    <span class="text-sm font-medium text-fg-title mt-3">
                        No search
                    </span>
                    <span class="text-xs text-fg-muted mt-2">
                        Start typing somthing....
                    </span>
                </div>
            </template>
        </x-ui.modal.body>
        <x-ui.modal.footer class="[--gutter:--spacing(2)] flex items-center justify-between text-xs text-fg-muted">
            <div class="flex items-center gap-4">
                <div class="flex items-center gap-1">
                    <x-ui.kbd size="sm">
                        ↑
                    </x-ui.kbd>
                    <x-ui.kbd size="sm">
                        ↓
                    </x-ui.kbd>
                    to navigate
                </div>
                <div class="flex items-center gap-1">
                    <x-ui.kbd size="sm">
                        ↵
                    </x-ui.kbd>
                    to select
                </div>
            </div>
            <div class="flex items-center gap-1">
                <x-ui.kbd size="sm" class="">esc</x-ui.kbd>to
                close
            </div>
        </x-ui.modal.footer>
    </x-ui.modal.content>
</x-ui.modal>
