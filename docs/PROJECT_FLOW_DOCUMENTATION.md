# Digital Shiksha Darpan Flow Document

## 1. Purpose
This document defines the complete website flow for two roles only:
- Student
- Teacher

It covers the user journey from first website visit to regular platform usage, including key decision points, access controls, and expected outcomes.

## 2. User Roles
### Student
Primary goal:
- Discover exams and study materials
- Attempt mock tests
- Track performance and progress

### Teacher
Primary goal:
- Create and manage academic content
- Publish and maintain mock tests and study materials
- Monitor learner engagement and outcomes

## 3. End-to-End Website Flow (High Level)
1. Visitor lands on homepage
2. Visitor explores public content
3. Visitor selects action requiring authentication
4. User logs in or registers
5. System routes user by role
6. User performs role-specific actions
7. User logs out or continues session

---

## 4. Common Entry Flow (Before Role Split)
### 4.1 Landing and Discovery
User enters via:
- Homepage
- Mock Test listing page
- Study Material page
- Blog/Search page
- Shared direct link

Publicly visible actions:
- Browse exam listings
- Browse notices/content highlights
- View informational pages (About, FAQ, Contact, etc.)

### 4.2 Authentication Trigger Points
Login/Register is required when user tries to:
- Start an exam
- Access protected study material details
- Open role-specific dashboard features

### 4.3 Login and Registration
User options:
- Login with existing credentials
- Register as new user
- Recover password (if forgotten)

System behavior:
- Validates credentials
- Identifies role (`Student` or `Teacher`)
- Redirects user to intended destination or role dashboard

---

## 5. Student Flow

## 5.1 Student Journey Overview
1. Student logs in
2. Student lands on student dashboard/home context
3. Student selects learning action
4. Student attempts content
5. Student views result/progress
6. Student repeats cycle

## 5.2 Student Primary Actions
### A) Mock Test Attempt Flow
1. Open `Mock Test` listing
2. Filter/search/select test
3. View exam summary
4. Read instructions
5. Start exam
6. Submit answers
7. System evaluates score
8. Student sees result summary and detailed analysis
9. Student can revisit past results

Expected output:
- Score
- Pass/fail status
- Accuracy/performance details
- Attempt history

### B) Study Material Consumption Flow
1. Open `Study Material` listing
2. Navigate category hierarchy
3. Open material type:
   - Long answer
   - Video
   - PDF
   - MCQ
4. Consume content
5. Mark progress implicitly through usage

Expected output:
- Better exam readiness
- Progressive learning continuity

### C) Account and Personal Use Flow
1. View dashboard stats
2. Review past exam attempts
3. Access profile settings
4. Update password/profile as needed
5. Logout

## 5.3 Student Decision Rules
- Not logged in + exam start -> redirect to login
- Not logged in + protected study content -> redirect to login
- Logged in + valid access -> continue

---

## 6. Teacher Flow

## 6.1 Teacher Journey Overview
1. Teacher logs in
2. Teacher lands on teacher/admin workspace
3. Teacher creates or manages content
4. Teacher publishes/updates academic items
5. Teacher monitors outcomes and refines content

## 6.2 Teacher Primary Actions
### A) Mock Test Management Flow
1. Create or open exam
2. Define metadata:
   - Title
   - Category/subcategory
   - Timing
   - Visibility/activation
3. Add questions (manual or bulk upload path)
4. Add answer keys and media attachments
5. Set exam configuration
6. Publish exam
7. Edit, deactivate, or delete when required

Expected output:
- Live mock tests available to students
- Controlled exam lifecycle management

### B) Study Material Management Flow
1. Open syllabus/content management area
2. Create or edit topic entries
3. Upload/attach material assets:
   - PDF
   - Video links
   - Long-form text
   - MCQ blocks
4. Publish updates
5. Remove outdated material

Expected output:
- Structured and current study content for students

### C) Blog and Informational Content Flow
1. Create post
2. Choose media type (image/file/video)
3. Publish post
4. Edit or remove posts

Expected output:
- Ongoing communication and knowledge updates

### D) Student/Result Monitoring Flow
1. Open exam results area
2. Review attempts and outcomes
3. Export results where required
4. Use feedback to improve question quality and difficulty balance

## 6.3 Teacher Decision Rules
- Teacher can manage academic content only after authenticated role verification
- Invalid/incomplete content inputs must be corrected before publish
- Deactivation should be preferred over hard deletion for active academic cycles

---

## 7. Cross-Role Functional Flow

## 7.1 Navigation Consistency
Both roles should experience:
- Consistent top navigation
- Clear action buttons
- Role-relevant menu visibility

## 7.2 Session and Redirect Behavior
- If session expires during protected action:
  - User is redirected to login
  - After login, user returns to intended page where possible

## 7.3 Error and Recovery Flow
Common recovery paths:
- Validation error -> show actionable message -> stay on same form
- Permission error -> redirect to allowed area
- Empty data state -> show meaningful no-data view with next action

---

## 8. Lifecycle Summary by Role

## 8.1 Student Lifecycle
Discover -> Register/Login -> Learn -> Attempt -> Analyze Result -> Improve -> Reattempt

## 8.2 Teacher Lifecycle
Login -> Create Content -> Publish -> Monitor Student Outcomes -> Improve Content -> Republish

---

## 9. Success Criteria
A successful website flow should ensure:
- Students can move from discovery to exam attempt with minimal friction
- Teachers can publish and maintain content without ambiguity
- Access control is role-correct at every protected step
- Result visibility and learning continuity are always available to students

---

## 10. Recommended Operational Standards
- Keep login prompts contextual and non-disruptive
- Keep exam flow linear: Summary -> Instructions -> Start -> Submit -> Result
- Ensure teacher publish actions always include validation and confirmation
- Maintain clear role separation in dashboard actions
- Prioritize fast navigation to key actions (Start Exam, Create Exam, View Results)
