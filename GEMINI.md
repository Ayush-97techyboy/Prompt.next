# Engineering, Architectural & Implementation Standards

## 1. Continuous Project Learning & Problem-Solving Doctrine
- **Requirement & Blocker Analysis**: In every project—whether plain HTML5/CSS3/Vanilla JS, modern React/Next.js, or complex Full-Stack systems—rigorously analyze:
  - Exact requirements and acceptance criteria before writing code.
  - Potential architectural blockers, layout edge cases, and unexpected interaction states.
  - The logical foundation behind what the user/designer intends versus superficial code approximations.
- **Root-Cause Resolution (No Band-Aids)**: Solve issues at the underlying CSS/JS/component architectural level rather than applying conflicting ad-hoc hacks that create regressions downstream.
- **Adaptive Memory Logging**: Persistently retain project findings, developer feedback, and bug resolutions across sessions to continuously refine fidelity and execution speed.

## 2. UI Indicator, Active States & Layout Integrity
- **Constant Geometry for Cursors & Indicators**: Never mutate the height, width, or stroke dimensions of active indicator bars, pipes, or bullets based on text line count or content length unless explicitly requested.
- **Vertical Centering**: Always center indicator bars vertically relative to the container frame using `top: 50%; transform: translateY(-50%);` with a fixed, specified height (e.g. `44px`) so single-line, 2-line, and multi-line items maintain identical cursor appearance without layout shifts.
- **Permanent Indentation & Gutters**: Keep padding and indentation constant across all states (both active and inactive) so selecting, hovering, or scrolling does not cause text reflows or sudden horizontal jumps.

## 3. Design-to-Code Fidelity & Communication
- **Strict Adherence to Figma/Design Specs**: Follow user-specified dimensions, layout tokens, and Figma inspections exactly. Do not apply arbitrary font variants, unrequested letter-spacing hacks, or divergent overrides.
- **Minimal Process Output**: When executing implementations, keep explanations concise, focused on concrete changes made, and avoid unnecessary verbosity.
